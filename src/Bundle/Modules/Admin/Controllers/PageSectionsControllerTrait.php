<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;


use Marktic\Cms\Bundle\Modules\Admin\Forms\PageSections\DetailsForm;

trait PageSectionsControllerTrait
{
    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }
}