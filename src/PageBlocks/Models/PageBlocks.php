<?php

declare(strict_types=1);

namespace Marktic\Cms\PageBlocks\Models;

use Nip\Records\RecordManager;

class PageBlocks extends RecordManager
{
    use PageBlocksRepositoryTrait;
    use \ByTIC\Records\Behaviors\I18n\I18nRecordsTrait;
    use \ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
}
