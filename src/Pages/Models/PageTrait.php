<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\HasTenant\HasTenantRecord;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Nip\Records\Collections\Collection;
use Nip\Records\Traits\HasUuid\HasUuidRecordTrait;

/**
 */
trait PageTrait
{
    use HasTenantRecord;
    use TimestampableTrait;
    use HasFormsRecordTrait;
    use RecordHasMetadataTrait;
}
