<?php

declare(strict_types=1);

namespace Marktic\Cms\Menus\Models;

use Nip\Records\RecordManager;

class Menus extends RecordManager
{
    use MenuRepositoryTrait;
    use \ByTIC\Records\Behaviors\I18n\I18nRecordsTrait;
    use \ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
}
