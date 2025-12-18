<?php

declare(strict_types=1);

namespace Marktic\Cms\MenuItems\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait MenuItemRepositoryTrait
{
    public const TABLE = 'mkt_cms_menus';
    public const CONTROLLER = 'mkt_cms-menu_items';

    use BaseRepositoryTrait;

    protected function initRelationsCms()
    {
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::MENU_ITEMS);
    }
}
