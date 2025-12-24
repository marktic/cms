<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;

use Marktic\Cms\Bundle\Modules\Admin\Forms\PageSections\DetailsForm;
use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\PageSections\Models\PageSection;
use Marktic\Cms\Utility\CmsModels;

trait PageSectionsControllerTrait
{

    public function addNewModel()
    {
        /** @var PageSection $record */
        $record = parent::addNewModel();

        $page = $this->getCmsPageFromRequest();
        $record->populateFromPage($page);
        return $record;
    }

    public function order()
    {
        $page = $this->getCmsPageFromRequest();

        parse_str($_POST['order'], $order);
        $idSections = $order['section'];

        $fields = $page->getCmsPageSections();
        $fields = $fields->keyBy('id');

        if (count($fields) < 1) {
            $this->Async()->sendMessage('No fields', 'error');
        }

        foreach ($idSections as $pos => $idSection) {
            $record = $fields[$idSection];
            if ($record) {
                $record->position = $pos + 1;
                $record->update();
            }
        }

        $this->Async()->sendMessage('Fields reordered');
    }

    /**
     * @param $type
     * @param PageSection $item
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

    /**
     * @return Page
     */
    protected function getCmsPageFromRequest()
    {
        $model = CmsModels::pages()->getController();
        if (!$this->hasForeignModelFromRequest($model)) {
            return $this->checkForeignModelFromRequest($model, ['page_id', 'id']);
        }
        return $this->getForeignModelFromRequest($model);
    }

    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }
}