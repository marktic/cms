<?php

namespace Marktic\Cms\PageSections\ModelsRelated\HasPageSection;

use Marktic\Cms\Utility\CmsModels;

trait HasPageSectionRepositoryTrait
{
    public const RELATION_CMS_PAGE_SECTION = 'CmsPageSection';

    protected function initRelations(): void
    {
        parent::initRelations();
        $this->initRelationsCms();
    }

    protected function initRelationsCms(): void
    {
        $this->initRelationsCmsPageSection();
    }

    /**
     * @inheritDoc
     */
    protected function initRelationsCmsPageSection()
    {
        $this->belongsTo(
            self::RELATION_CMS_PAGE_SECTION,
            ['class' => CmsModels::pageSectionsClass(), 'fk' => 'section_id']
        );
    }
}
