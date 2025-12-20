<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Dto;

use Marktic\Cms\Utility\CmsModels;

enum PageSectionCols: int
{
    public const DEFAULT = self::FULL;

    case FULL = 1;
    case TWO_COLS = 2;
    case THREE_COLS = 3;
    case FOUR_COLS = 4;

    public function getLabel(): string
    {
        return match ($this) {
            self::FULL => CmsModels::pageSections()->getLabel('cols.full'),
            self::TWO_COLS => CmsModels::pageSections()->getLabel('cols.two_cols'),
            self::THREE_COLS => CmsModels::pageSections()->getLabel('cols.three_cols'),
            self::FOUR_COLS => CmsModels::pageSections()->getLabel('cols.four_cols'),
        };
    }
}