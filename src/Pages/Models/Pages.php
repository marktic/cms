<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Models;

use Marktic\Cms\Base\Models\CmsRecordsTrait;
use Nip\Records\RecordManager;

class Pages extends RecordManager
{
    use PageRepositoryTrait, CmsRecordsTrait {
        PageRepositoryTrait::generateFilterManagerDefaultClass insteadof CmsRecordsTrait;
    }
}
