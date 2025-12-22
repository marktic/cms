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