<?php

declare(strict_types=1);

namespace Marktic\Cms\Menus\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait MenuRepositoryTrait
{
    public const TABLE = 'cms_menus';
    public const CONTROLLER = 'cms-menus';

    use BaseRepositoryTrait;

    protected function initRelationsCms()
    {
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::MENUS);
    }
}
