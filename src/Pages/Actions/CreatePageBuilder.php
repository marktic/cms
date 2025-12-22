<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Actions;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\Pages\Dto\PageBuilder\PageBuilder;
use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\PageSections\Models\PageSections;
use Nip\Records\Collections\Associated;
use Nip\Records\Collections\Collection;

class CreatePageBuilder extends Action
{
    use HasSubject;

    protected ?PageBuilder $pageBuilder = null;

    public function create(): ?PageBuilder
    {
        return $this->getPageBuilder();
    }

    protected function getPageBuilder()
    {
        if ($this->pageBuilder === null){
            $this->initBuilder();
        }
        return $this->pageBuilder;
    }

    protected function initBuilder(): void
    {
        $page = $this->getSubject();
        $this->pageBuilder = PageBuilder::buildFromPage($page);

        $sections = $this->initBuilderSections($page);
        $this->initBuilderBlocks($sections);
    }

    protected function initBuilderSections(Page $page): Collection|array
    {
        $sections = $page->getCmsPageSections();
        $this->pageBuilder->setPageSections($sections);
        return $sections;
    }

    protected function initBuilderBlocks(Associated|array $sections): void
    {
        $blocks = $sections->loadRelation(PageSections::RELATION_CMS_PAGE_BLOCKS);
        foreach ($blocks as $block) {
            $this->pageBuilder->addBlock($block);
        }
    }
}

