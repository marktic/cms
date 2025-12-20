<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;

use Marktic\Cms\Bundle\Modules\Admin\Controllers\Behaviours\HasTenantControllerTrait;
use Marktic\Cms\Bundle\Modules\Admin\Forms\Pages\DetailsForm;

trait PagesControllerTrait
{
    use HasTenantControllerTrait;
    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }
}