<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Models;

use Nip\Records\RecordManager;

class Pages extends RecordManager
{
    use PageRepositoryTrait;
    use \ByTIC\Records\Behaviors\I18n\I18nRecordsTrait;
    use \ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
}
