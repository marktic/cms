<?php

declare(strict_types=1);

namespace Marktic\Cms\PageBlocks\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Marktic\Cms\PageBlocks\Dto\PageBlocksMetadata;
use Marktic\Cms\PageBlocks\Models\Behaviours\HasTypes\HasTypesRecordTrait;
use Marktic\Cms\PageSections\ModelsRelated\HasPageSection\HasPageSectionRecordTrait;

/**
 *
 * @property PageBlocksMetadata $metadata
 * @method PageBlocksMetadata getMetadata
 */
trait PageBlockTrait
{
    use TimestampableTrait;
    use HasFormsRecordTrait;
    use RecordHasMetadataTrait;
    use HasTypesRecordTrait;
    use HasPageSectionRecordTrait;

    public string $title = '';

    public function getName(): string
    {
        return $this->title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    protected function getMetadataClass(): ?string
    {
        return PageBlocksMetadata::class;
    }
}
