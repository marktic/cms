<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Dto;

use ByTIC\DataObjects\Casts\Metadata\Metadata;

class PageSectionsMetadata extends Metadata
{
    public const KEY_COLS = 'col';
    const COL_DEFAULT = 1;

    public function getCols(): string|int
    {
        return $this->get(self::KEY_COLS, 1);
    }

    public function setCols(?string $role): void
    {
        $this->set(self::KEY_COLS, $role);
    }

}