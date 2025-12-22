<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Cms\PageBlocks\ModelsRelated\HasPageBlocks\HasPageBlocksRepositoryTrait;
use Marktic\Cms\Pages\ModelsRelated\HasPage\HasPageRepositoryTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait PageSectionsRepositoryTrait
{
    public const TABLE = 'mkt_cms_page_sections';
    public const CONTROLLER = 'mkt_cms-page_sections';

    use BaseRepositoryTrait, HasPageRepositoryTrait, HasPageBlocksRepositoryTrait {
        BaseRepositoryTrait::initRelations insteadof HasPageRepositoryTrait;
        BaseRepositoryTrait::initRelations insteadof HasPageBlocksRepositoryTrait;
    }

    protected function initRelationsCms(): void
    {
        $this->initRelationsCmsPage();
        $this->initRelationsCmsPageBlocks();
    }

    public function generatePrimaryFK(): string
    {
        return 'section_id';
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::PAGE_SECTIONS);
    }
}
