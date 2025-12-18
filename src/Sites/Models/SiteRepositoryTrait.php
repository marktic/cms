<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\HasTenant\HasTenantRepository;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Base\Models\Traits\HasDatabaseConnectionTrait;
use Marktic\Cms\Sites\Models\Filters\FilterManager;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait SiteRepositoryTrait
{
    public const TABLE = 'mkt_cms_sites';
    public const CONTROLLER = 'mkt_cms-sites';

    use BaseRepositoryTrait, HasTenantRepository {
        HasTenantRepository::initRelations insteadof BaseRepositoryTrait;
        HasTenantRepository::initRelationsCms insteadof BaseRepositoryTrait;
    }

    protected function generateFilterManagerDefaultClass(): string
    {
        return FilterManager::class;
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::SITES);
    }
}
