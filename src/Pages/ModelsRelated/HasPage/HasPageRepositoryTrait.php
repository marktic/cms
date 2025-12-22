<?php

namespace Marktic\Cms\Pages\ModelsRelated\HasPage;

use Marktic\Cms\Utility\CmsModels;

trait HasPageRepositoryTrait
{
    public const RELATION_CMS_PAGE = 'CmsPage';

    protected function initRelations(): void
    {
        parent::initRelations();
        $this->initRelationsCms();
    }

    protected function initRelationsCms(): void
    {
        $this->initRelationsCmsPage();
    }

    public function initRelationsCmsPage(): void
    {
        $this->belongsTo(
            self::RELATION_CMS_PAGE,
            [
                'class' => CmsModels::pagesClass(),
                'fk' => 'page_id',
            ]);
    }
}
