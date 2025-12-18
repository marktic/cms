<?php

declare(strict_types=1);

namespace Marktic\Cms\Menus\Models;

use Marktic\Cms\Base\Models\CmsRecordsTrait;
use Nip\Records\RecordManager;

class Menus extends RecordManager
{
    use MenuRepositoryTrait;
    use CmsRecordsTrait;
}
