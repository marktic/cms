<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Models;

use Nip\Records\RecordManager;

class PageSections extends RecordManager
{
    use PageSectionsRepositoryTrait;
    use \ByTIC\Records\Behaviors\I18n\I18nRecordsTrait;
    use \ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
}
