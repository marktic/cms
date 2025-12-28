<?php

declare(strict_types=1);

namespace Marktic\Cms;

use ByTIC\PackageBase\BaseBootableServiceProvider;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

/**
 * Class CmsServiceProvider.
 */
class CmsServiceProvider extends BaseBootableServiceProvider
{
    public const NAME = 'mkt_cms';

    public function migrations(): ?string
    {
        if (PackageConfig::shouldRunMigrations()) {
            return dirname(__DIR__) . '/database/migrations/';
        }

        return null;
    }

    protected function translationsPath(): string
    {
        return dirname(__DIR__).'/resources/lang/';
    }

    protected function registerCommands()
    {
//        $this->commands(
//        );
    }
    public function boot(): void
    {
        parent::boot();
//        CmsModels::sites();
//        CmsModels::menus();
//        CmsModels::menuItems();
//        CmsModels::pages();
//        CmsModels::pageSections();
//        CmsModels::pageBlocks();
    }
}
