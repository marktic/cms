<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;

use Marktic\Cms\Bundle\Modules\Admin\Forms\PageBlocks\DetailsForm;
use Marktic\Cms\PageBlocks\Models\PageBlock;
use Marktic\Cms\PageSections\Models\PageSection;
use Marktic\Cms\Utility\CmsModels;

trait PageBlocksControllerTrait
{
    public function bootPageBlocksControllerTrait()
    {
        $this->onParseRequest(function () {
            if (!$this->getRequest()->has('section_id')) {
                return;
            }

            $model = CmsModels::pageSections()->getController();
            $this->checkForeignModelFromRequest($model, ['section_id', 'id']);
        });
    }

    public function order(): void
    {
        $idBlocks = (array) $this->getRequest()->get('order');
        $section_id = $this->getRequest()->get('section_id');
        $col_id = $this->getRequest()->get('col_id');

        $blocks = CmsModels::pageBlocks()->findByPrimary($idBlocks);
        $blocks = $blocks->keyBy('id');

        if (count($blocks) < 1) {
            $this->Async()->sendMessage('No blocks found', 'error');
        }

        foreach ($idBlocks as $pos => $idBlock) {
            /** @var PageBlock|null $record */
            $record = $blocks[$idBlock] ?? null;
            if ($record) {
                $record->section_id = $section_id;
                $record->getMetadata()->setCol($col_id);
                $record->position = $pos + 1;
                $record->update();
            }
        }

        $this->Async()->sendMessage('Blocks reordered');
    }

    public function addNewModel()
    {
        /** @var PageBlock $record */
        $record = parent::addNewModel();

        $pageSection = $this->getCmsPageSectionFromRequest();
        $record->populateFromPageSection($pageSection);

        $type = $this->getRequest()->get('block_type');
        $record->setType($type);

        $record->getMetadata()->setCol($this->getRequest()->get('col', 1));
        return $record;
    }

    /**
     * @param $type
     * @param PageBlock $item
     * @return void
     */
    protected function afterActionRedirect($type, $item): void
    {
        $page = $item->getCmsPage();

        $this->setAfterUrlFlash(
            $page->getURL(),
            $page->getManager()->getController(),
            ['after-' . $type]
        );

        parent::afterActionRedirect($type, $item);
    }

    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }

    /**
     * @return PageSection
     */
    protected function getCmsPageSectionFromRequest()
    {
        $model = CmsModels::pageSections()->getController();
        return $this->getForeignModelFromRequest($model);
    }
}