<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Models;

use Marktic\Cms\Base\Models\CmsRecordTrait;
use Nip\Records\Record;

class PageSection extends Record
{
    use CmsRecordTrait;
    use PageSectionTrait;
}