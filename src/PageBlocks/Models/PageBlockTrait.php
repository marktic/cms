<?php

declare(strict_types=1);

namespace Marktic\Cms\PageBlocks\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Marktic\Cms\PageBlocks\Dto\PageBlocksMetadata;
use Marktic\Cms\PageBlocks\Models\Behaviours\HasTypes\HasTypesRecordTrait;

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

    protected function getMetadataClass(): ?string
    {
        return PageBlocksMetadata::class;
    }
}
