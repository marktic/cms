<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Dto\PageBuilder;

use Marktic\Cms\PageBlocks\Models\PageBlock;

class PageCol
{
    protected int $pos = 1;

    protected $blocks = [];

    public function getPos(): int
    {
        return $this->pos;
    }

    public function setPos(int $pos): void
    {
        $this->pos = $pos;
    }

    public function addBlock(PageBlock $block): self
    {
        $this->blocks[$block->id] = $block;
        return $this;
    }
}