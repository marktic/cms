<?php

namespace Marktic\Cms\Bundle\Setup;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\Cacheable;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use DateInterval;
use Marktic\Cms\Pages\Actions\Find\GetPageForSiteByRole;
use Marktic\Cms\Pages\Dto\PageMetadata;
use Marktic\Cms\Sites\Actions\Find\CreateSitesForMandatoryRoles;

class SetupCms extends Action
{
    use HasSubject;
    use Cacheable;

    protected function dataCacheKey($key = null): string
    {
        $tenant = $this->getSubject();
        return 'cms.setup.complete.tenant.' . $tenant->id;
    }

    protected function generateCacheDataKey(string $key, mixed $default = null)
    {
        $sites = CreateSitesForMandatoryRoles
            ::for($this->getSubject())
            ->execute();

        foreach ($sites as $site) {
           $homepage = GetPageForSiteByRole::for($site)
               ->withRole(PageMetadata::ROLE_HOMEPAGE)
               ->orCreate()
                ->fetch();
        }

        return ['cms_setup_complete' => true];
    }

    /**
     * @param null $key
     * @return DateInterval
     */
    protected function dataCacheTtl($key = null): DateInterval
    {
        return DateInterval::createFromDateString('14 days');
    }
}
