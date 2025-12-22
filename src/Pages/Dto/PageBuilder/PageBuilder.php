<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Dto\PageBuilder;

use ByTIC\DataObjects\Casts\Metadata\Metadata;
use Marktic\Cms\PageBlocks\Models\PageBlock;
use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\PageSections\Models\PageSection;
use Nip\Records\Collections\Collection;

class PageBuilder extends Metadata
{
    protected Page $page;

    /**
     * @var PageRow[]
     */
    protected $rows = [];

    /**
     * @var PageCol
     */
    protected $cols = [];

    public static function buildFromPage(Page $page): PageBuilder
    {
        $builder = new self();
        $builder->page = $page;
        return $builder;
    }

    /**
     * @param Collection|array|PageSection[] $sections
     * @return $this
     */
    public function setPageSections(Collection|array $sections): static
    {
        foreach ($sections as $section) {
            $this->rows[$section->id] = PageRow::fromPageSection($section);
        }
        return $this;
    }

    public function addBlock(PageBlock $block): static
    {
        $this->rows[$block->section_id]->addBlock($block);
        return $this;
    }
}