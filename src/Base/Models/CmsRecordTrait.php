<?php

declare(strict_types=1);

namespace Marktic\Cms\Base\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\PageSections\ModelsRelated\HasPageSection\HasPageSectionRecordTrait;

/**
 * Trait CommonRecordTrait.
 */
trait CmsRecordTrait
{
    use HasFormsRecordTrait;
    use HasPageSectionRecordTrait;
}
