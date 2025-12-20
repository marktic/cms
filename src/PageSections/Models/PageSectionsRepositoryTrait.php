<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait PageSectionsRepositoryTrait
{
    public const TABLE = 'mkt_cms_page_sections';
    public const CONTROLLER = 'mkt_cms-page_sections';

    public const RELATION_CMS_PAGE = 'CmsPage';

    use BaseRepositoryTrait;

    protected function initRelationsCms(): void
    {
        $this->initRelationsCmsPage();
    }

    public function initRelationsCmsPage(): void
    {
        $this->belongsTo(
            self::RELATION_CMS_PAGE,
            [
            'class' => CmsModels::pagesClass(),
            'fk' => 'page_id',
        ]);
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::PAGE_SECTIONS);
    }
}
