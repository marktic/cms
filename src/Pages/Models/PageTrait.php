<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\HasTenant\HasTenantRecord;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Marktic\Cms\Pages\Dto\PageMetadata;
use Marktic\Cms\PageSections\Models\PageSection;
use Nip\Records\Collections\Collection;
use Nip\Records\Traits\HasUuid\HasUuidRecordTrait;

/**
 * @property PageMetadata $metadata
 * @method PageSection[]|Collection getCmsPageSections()
 */
trait PageTrait
{
    use HasTenantRecord;
    use TimestampableTrait;
    use HasFormsRecordTrait;
    use RecordHasMetadataTrait;

    protected string $name = '';
    protected string $slug = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    protected function getMetadataClass(): ?string
    {
        return PageMetadata::class;
    }
}
