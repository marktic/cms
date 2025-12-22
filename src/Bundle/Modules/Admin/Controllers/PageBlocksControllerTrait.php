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