<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Models;

use Marktic\Cms\Base\Models\CmsRecordsTrait;
use Nip\Records\RecordManager;

/**
 * @method Site getNew($data = [])
 */
class Sites extends RecordManager
{
    use SiteRepositoryTrait, CmsRecordsTrait {
        SiteRepositoryTrait::generateFilterManagerDefaultClass insteadof CmsRecordsTrait;
    }
}
