<?php

declare(strict_types=1);

namespace Marktic\Cms\MenuItems\Models;

use Marktic\Cms\Base\Models\CmsRecordsTrait;
use Nip\Records\RecordManager;

class MenuItems extends RecordManager
{
    use MenuItemRepositoryTrait;
    use CmsRecordsTrait;
}
