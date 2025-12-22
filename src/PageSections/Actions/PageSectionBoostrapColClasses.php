<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Actions;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\PageSections\Models\PageSection;

/**
 * @method PageSection getSubject()
 */
class PageSectionBoostrapColClasses extends Action
{
    use HasSubject;

    public function get(): string
    {
        $cols = (int) $this->getSubject()->getMetadata()->getCols();
        return self::forCols($cols);
    }

    public static function forCols(int $cols): string
    {
        return match ($cols) {
            4 => 'col-12 col-md-3',
            3 => 'col-12 col-md-4',
            2 => 'col-12 col-md-6',
            default => 'col-12',
        };
    }
}