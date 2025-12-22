<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Dto\PageBuilder;

use Marktic\Cms\PageBlocks\Models\PageBlock;

class PageCol
{
    protected int $pos = 1;

    protected $cssClasses = [];

    protected $blocks = [];

    public function getPos(): int
    {
        return $this->pos;
    }

    public function setPos(int $pos): void
    {
        $this->pos = $pos;
    }

    public function addCssClasses(array $classes): self
    {
        $this->cssClasses = array_merge($this->cssClasses, $classes);
        return $this;
    }

    public function getCssClasses(): array
    {
        return $this->cssClasses;
    }

    public function addBlock(PageBlock $block): self
    {
        $this->blocks[$block->id] = $block;
        return $this;
    }

    /**
     * @return PageBlock[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }
}
