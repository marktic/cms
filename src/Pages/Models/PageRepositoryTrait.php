<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Models;

use Marktic\Cms\Base\Models\HasTenant\HasTenantRepository;
use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Pages\Actions\Transform\GeneratePageSlug;
use Marktic\Cms\Pages\Models\Filters\FilterManager;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait PageRepositoryTrait
{
    public const TABLE = 'mkt_cms_pages';
    public const CONTROLLER = 'mkt_cms-pages';

    use BaseRepositoryTrait, HasTenantRepository {
        HasTenantRepository::initRelations insteadof BaseRepositoryTrait;
        HasTenantRepository::initRelationsCms insteadof BaseRepositoryTrait;
    }

    protected function initRelationsCms()
    {
    }

    public function bootPageRepositoryTrait(): void
    {
        static::creating(function ($event) {
            $model = $event->getRecord();
            GeneratePageSlug::for($model)->checkOrSet();
        });
    }

    protected function generateFilterManagerDefaultClass(): string
    {
        return FilterManager::class;
    }

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::PAGES);
    }
}
