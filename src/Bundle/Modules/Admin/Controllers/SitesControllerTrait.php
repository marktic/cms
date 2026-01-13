<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;

use Marktic\Cms\Bundle\Modules\Admin\Controllers\Behaviours\HasTenantControllerTrait;
use Marktic\Cms\Bundle\Modules\Admin\Forms\Sites\DetailsForm;
use Marktic\Cms\SitesRoles\Actions\GetSiteRoles;

trait SitesControllerTrait
{
    use HasTenantControllerTrait;

    protected function bootSitesControllerTrait(): void
    {
        $this->after(function () {
            $this->payload()->with([
                'siteRoles' => GetSiteRoles::available(),
            ]);
        });
    }

    protected function getModelFormClass($model, $action = null): string
    {
        return DetailsForm::class;
    }
}