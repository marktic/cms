<?php

declare(strict_types=1);

namespace Marktic\Cms\PageBlocks\Models;

use Marktic\Cms\Base\Models\CmsRecordTrait;
use Nip\Records\Record;

class PageBlock extends Record
{
    use CmsRecordTrait;
    use PageBlockTrait;

    public function getRegistry()
    {
    }
}