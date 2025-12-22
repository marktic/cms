<?php

namespace Marktic\Cms\PageBlocks\ModelsRelated\HasPageBlocks;

use Marktic\Cms\Utility\CmsModels;

trait HasPageBlocksRepositoryTrait
{
    public const RELATION_CMS_PAGE_BLOCKS = 'CmsPageBlocks';

    protected function initRelations(): void
    {
        parent::initRelations();
        $this->initRelationsCms();
    }

    protected function initRelationsCms(): void
    {
        $this->initRelationsCmsPageBlocks();
    }

    public function initRelationsCmsPageBlocks(): void
    {
        $this->hasMany(
            self::RELATION_CMS_PAGE_BLOCKS,
            [
                'class' => CmsModels::pageBlocksClass(),
            ]);
    }
}
