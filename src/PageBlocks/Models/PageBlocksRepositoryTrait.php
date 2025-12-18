<?php

declare(strict_types=1);

namespace Marktic\Cms\PageBlocks\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait PageBlocksRepositoryTrait
{
    public const TABLE = 'mkt_cms_page_blocks';
    public const CONTROLLER = 'mkt_cms-page_blocks';

    use BaseRepositoryTrait;

    protected function initRelationsCms()
    {
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::PAGE_BLOCKS);
    }

}
