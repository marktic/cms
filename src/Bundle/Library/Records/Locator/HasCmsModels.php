<?php

namespace Marktic\Cms\Bundle\Library\Records\Locator;

use Marktic\Cms\MenuItems\Models\MenuItems;
use Marktic\Cms\Menus\Models\Menus;
use Marktic\Cms\PageBlocks\Models\PageBlocks;
use Marktic\Cms\Pages\Models\Pages;
use Marktic\Cms\PageSections\Models\PageSections;
use Marktic\Cms\Sites\Models\Sites;
use Marktic\Cms\Utility\CmsModels;
use Nip\Records\RecordManager;

trait HasCmsModels
{
    /**
     */
    public static function cmsSites(): Sites|RecordManager
    {
        return CmsModels::sites();
    }

    /**
     * @return Menus|RecordManager
     */
    public static function cmsMenus(): Menus|RecordManager
    {
        return CmsModels::menus();
    }

    public static function cmsMenuItems(): MenuItems|RecordManager
    {
        return CmsModels::menuItems();
    }

    public static function cmsPages(): Pages|RecordManager
    {
        return CmsModels::pages();
    }

    public static function cmsPageSections(): RecordManager|PageSections
    {
        return CmsModels::pageSections();
    }

    public static function cmsPageBlocks(): PageBlocks|RecordManager
    {
        return CmsModels::pageBlocks();
    }
}