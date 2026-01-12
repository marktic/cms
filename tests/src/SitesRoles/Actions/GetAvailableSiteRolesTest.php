<?php

declare(strict_types=1);

namespace Marktic\Cms\Tests\SitesRoles\Actions;

use Marktic\Cms\CmsServiceProvider;
use Marktic\Cms\SitesRoles\Actions\GetSiteRoles;
use Marktic\Cms\SitesRoles\Dto\SiteRolesCollection;
use Marktic\Cms\Tests\TestCase;
use Marktic\Cms\Utility\PackageConfig;
use Nip\Container\Container;

class GetAvailableSiteRolesTest extends TestCase
{
    public function test_execute()
    {
        $configData = [
            CmsServiceProvider::NAME => [
                'site_roles' => [
                    ['name' => 'default', 'label' => 'Default']
                ]
            ]
        ];
        $config = new \Nip\Config\Config($configData);
        Container::getInstance()->set('config', $config);

        $packageConfig = PackageConfig::instance();
        $refObject = new \ReflectionObject($packageConfig);
        $refProperty = $refObject->getProperty('cache');
        $refProperty->setAccessible(true);
        $refProperty->setValue($packageConfig, []);

        GetSiteRoles::instance()->unmemoize('site-roles');
        $roles = GetSiteRoles::available();

        $this->assertInstanceOf(SiteRolesCollection::class, $roles);
        $this->assertGreaterThan(0, $roles->count());
        $this->assertEquals('default', $roles->first()->getName());
    }
}
