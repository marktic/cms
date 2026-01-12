<?php

declare(strict_types=1);

namespace Marktic\Cms\SitesRoles\Actions;

use Bytic\Actions\Action;
use ByTIC\Memoize\Traits\Memoizable;
use Marktic\Cms\SitesRoles\Dto\SiteRolesCollection;
use Marktic\Cms\Utility\PackageConfig;
use Nip\Utility\Traits\SingletonTrait;

class GetSiteRoles extends Action
{
    use Memoizable;
    use SingletonTrait;

    public static function available(): SiteRolesCollection
    {
        $instance = self::instance();
        return $instance->memoize('site-roles', function () use ($instance) {
            return $instance->fetch();
        });
    }

    protected function fetch(): SiteRolesCollection
    {
        $config = PackageConfig::siteRoles();

        return SiteRolesCollection::fromConfig($config);
    }
}
