<?php

declare(strict_types=1);

namespace Marktic\Cms\SiteLinks\Models;

use Marktic\Cms\Base\Models\CmsRecordsTrait;
use Nip\Records\RecordManager;

class SiteLinks extends RecordManager
{
    use SiteLinksRepositoryTrait, CmsRecordsTrait {
    }
}