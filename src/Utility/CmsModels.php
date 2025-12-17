<?php

declare(strict_types=1);

namespace Marktic\Cms\Utility;

use ByTIC\PackageBase\Utility\ModelFinder;
use Marktic\Cms\CmsServiceProvider;
use Marktic\Cms\MenuItems\Models\MenuItems;
use Marktic\Cms\Menus\Models\Menus;
use Marktic\Cms\PageBlocks\Models\PageBlocks;
use Marktic\Cms\Pages\Models\Pages;
use Marktic\Cms\PageSections\Models\PageSections;
use Marktic\Cms\Sites\Models\Sites;
use Nip\Records\RecordManager;

/**
 * Class CmsModels.
 */
class CmsModels extends ModelFinder
{
    public const string SITES = 'sites';

    public const string MENUS = 'menus';

    public const string MENU_ITEMS = 'menu_items';

    public const string PAGES = 'pages';

    public const string PAGE_SECTIONS = 'page_sections';

    public const string PAGE_BLOCKS = 'page_blocks';


    public static function sites(): Sites|RecordManager
    {
        return static::getModels(self::SITES, Sites::class);
    }

    public static function sitesClass(): string
    {
        return get_class(static::sites());
    }

    /**
     * @return Menus|RecordManager
     */
    public static function menus(): Menus|RecordManager
    {
        return static::getModels(self::MENUS, Menus::class);
    }

    public static function menusClass(): string
    {
        return get_class(static::menus());
    }

    public static function menuItems()
    {
        return static::getModels(self::MENU_ITEMS, MenuItems::class);
    }

    public static function menuItemsClass(): string
    {
        return get_class(static::menuItems());
    }

    public static function pages(): Pages|RecordManager
    {
        return static::getModels(self::PAGES, Pages::class);
    }

    public static function pagesClass(): string
    {
        return get_class(static::pages());
    }

    public static function pageSections(): PageSections|RecordManager
    {
        return static::getModels(self::PAGE_SECTIONS, PageSections::class);
    }

    public static function pageSectionsClass(): string
    {
        return get_class(static::pageSections());
    }

    public static function pageBlocks(): PageBlocks|RecordManager
    {
        return static::getModels(self::PAGE_BLOCKS, PageBlocks::class);
    }

    public static function pageBlocksClass(): string
    {
        return get_class(static::pageBlocks());
    }

    protected static function packageName(): string
    {
        return CmsServiceProvider::NAME;
    }
}
