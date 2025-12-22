<?php

declare(strict_types=1);

namespace Marktic\Cms\PageBlocks\Dto;

use ByTIC\DataObjects\Casts\Metadata\Metadata;

class PageBlocksMetadata extends Metadata
{
    public const KEY_COL = 'col';
    const COL_DEFAULT = 1;


    public function getCol(): string|int
    {
        return $this->get(self::KEY_COL, 1);
    }

    public function setCol(?string $value): void
    {
        $this->set(self::KEY_COL, $value);
    }

}