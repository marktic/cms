<?php

declare(strict_types=1);

namespace Marktic\Cms\MenuItems\Models;

use Nip\Records\RecordManager;

class MenuItems extends RecordManager
{
    use MenuItemRepositoryTrait;
    use \ByTIC\Records\Behaviors\I18n\I18nRecordsTrait;
    use \ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
}
