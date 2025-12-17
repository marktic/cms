<?php

declare(strict_types=1);

namespace Marktic\Cms\PageSections\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PackageConfig;

trait PageSectionsRepositoryTrait
{
    public const TABLE = 'cms_page_sections';
    public const CONTROLLER = 'cms-page_sections';

    use HasFormsRecordsTrait;
    use TimestampableManagerTrait;

    protected function initRelations()
    {
        parent::initRelations();

        $this->initRelationsCms();
    }

    protected function initRelationsCms()
    {
//        $this->initRelationsBasketItems();
    }

//    protected function initRelationsBasketItems()
//    {
//        $this->hasMany('BasketItems',
//            ['class' => $this->relationBasketItemsClass()]
//        );
//    }
    protected function generateTable()
    {
        return PackageConfig::tableName(CmsModels::PAGE_SECTIONS);
    }

    protected function generateController(): string
    {
        return static::CONTROLLER;
    }
}
