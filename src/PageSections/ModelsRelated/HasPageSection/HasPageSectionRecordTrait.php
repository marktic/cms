<?php

namespace Marktic\Cms\PageSections\ModelsRelated\HasPageSection;

use Marktic\Cms\PageSections\Models\PageSection;

/**
 * @method PageSection getCmsPageSection()
 */
trait HasPageSectionRecordTrait
{
    public int|string|null $section_id = null;

    public function populateFromPageSection(PageSection $section): self
    {
        $this->section_id = $section->id;
        $this->getRelation('CmsPageSection')->setResults($section);
        return $this;
    }

    public function getCmsPage()
    {
        return $this->getCmsPageSection()->getCmsPage();
    }
}
