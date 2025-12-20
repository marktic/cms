<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;

use Marktic\Cms\Bundle\Modules\Admin\Controllers\Behaviours\HasTenantControllerTrait;
use Marktic\Cms\Bundle\Modules\Admin\Forms\Pages\DetailsForm;
use Marktic\Cms\Pages\Models\Page;

/**
 * @method Page getModelFromRequest
 */
trait PagesControllerTrait
{
    use HasTenantControllerTrait;

    public function view()
    {
        parent::view();
        $page = $this->getModelFromRequest();
        $pageSections = $page->getCmsPageSections();

        $this->payload()->with(
            [
                'pageSections' => $pageSections,
            ]
        );
    }

    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }
}