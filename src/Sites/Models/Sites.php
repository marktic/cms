<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Models;

use Nip\Records\RecordManager;

class Sites extends RecordManager
{
    use SiteRepositoryTrait;
    use \ByTIC\Records\Behaviors\I18n\I18nRecordsTrait;
    use \ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
}
