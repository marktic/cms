<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\Pages\ModelsRelated\HasPage\HasPageRecordTrait;
use Marktic\Cms\PageSections\Dto\PageSectionsMetadata;
use Marktic\Cms\Sites\Dto\SiteMetadata;
use Nip\Records\Collections\Collection;
use Nip\Records\Traits\HasUuid\HasUuidRecordTrait;

/**
 * @property PageSectionsMetadata $metadata
 * @method PageSectionsMetadata getMetadata
 * @method Page getCmsPage()
 */
trait PageSectionTrait
{
    use TimestampableTrait;
    use HasFormsRecordTrait;
    use RecordHasMetadataTrait;
    use HasPageRecordTrait;

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
        return PageSectionsMetadata::class;
    }
}
