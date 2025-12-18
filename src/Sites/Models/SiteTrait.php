<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\HasTenant\HasTenantRecord;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Marktic\Cms\Sites\Dto\SiteMetadata;
use Nip\Records\Collections\Collection;
use Nip\Records\Traits\HasUuid\HasUuidRecordTrait;

/**
 */
trait SiteTrait
{
    use HasTenantRecord;
    use TimestampableTrait;
    use HasUuidRecordTrait;
    use HasFormsRecordTrait;
    use RecordHasMetadataTrait;
    protected function getMetadataClass(): ?string
    {
        return SiteMetadata::class;
    }
}
