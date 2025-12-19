<?php

declare(strict_types=1);

namespace Marktic\Cms\SiteLinks\Models;

use Marktic\Cms\Base\Models\Traits\BaseRepositoryTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

/**
 * @method SiteLink getNew($data = [])
 */
trait SiteLinksRepositoryTrait
{
    public const TABLE = 'mkt_cms_site_links';

    use BaseRepositoryTrait;

    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::SITE_LINKS);
    }
}