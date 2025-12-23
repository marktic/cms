<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Dto\PageBuilder;

use Marktic\Cms\PageBlocks\Models\PageBlock;
use Marktic\Cms\PageSections\Actions\PageSectionBoostrapColClasses;
use Marktic\Cms\PageSections\Models\PageSection;

/**
 * Class PageRow.
 */
class PageRow
{
    protected PageSection $section;
    protected int $pos = 1;

    protected int $colsCount = 1;

    /**
     * @var PageCol[]
     */
    protected $cols = [];

    public static function fromPageSection(PageSection $section): self
    {
        $row = new self();
        $row->section = $section;
        $row->initCols($section->getMetadata()->getCols() ?: 1);
        return $row;
    }

    public function getSection(): PageSection
    {
        return $this->section;
    }

    public function getPos(): int
    {
        return $this->pos;
    }

    /**
     * @return PageCol[]
     */
    public function getCols(): array
    {
        return $this->cols;
    }

    protected function initCols($count = 1): void
    {
        $this->colsCount = $count;
        $colsClasses = PageSectionBoostrapColClasses::forCols($count);
        for ($i = 1; $i <= $count; $i++) {
            $pageCol = new PageCol();
            $pageCol->addCssClasses([$colsClasses]);
            $pageCol->setPos($i);
            $this->cols[$i] = $pageCol;
        }
    }

    public function addBlock(PageBlock $block): static
    {
        $colNum = $block->getMetadata()->getCol() ?: 1;
        $colNum = min($colNum, $this->colsCount);
        $this->cols[$colNum]->addBlock($block);
        return $this;
    }
}