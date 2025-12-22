<?php

namespace Marktic\Cms\Pages\ModelsRelated\HasPage;

use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\PageSections\Models\PageSections;

/**
 * @method Page getCmsPage()
 */
trait HasPageRecordTrait
{
    public string|int|null $page_id = null;

    public function populateFromPage(Page $page): void
    {
        $this->page_id = $page->id;
        $this->getRelation(PageSections::RELATION_CMS_PAGE)->setResults($page);
    }
}
