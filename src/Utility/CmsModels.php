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
use Marktic\Cms\SiteLinks\Models\SiteLinks;
use Marktic\Cms\Sites\Models\Sites;
use Nip\Records\RecordManager;

/**
 * Class CmsModels.
 */
class CmsModels extends ModelFinder
{
    public const SITES = 'sites';

    public const SITE_LINKS = 'site_links';

    public const MENUS = 'menus';

    public const MENU_ITEMS = 'menu_items';

    public const PAGES = 'pages';

    public const PAGE_SECTIONS = 'page_sections';

    public const PAGE_BLOCKS = 'page_blocks';


    public static function sites(): Sites|RecordManager
    {
        return static::getModels(self::SITES, Sites::class);
    }

    public static function sitesClass(): string
    {
        return static::getModelsClass(self::SITES, Sites::class);
    }

    public static function siteLinks(): Sites|RecordManager
    {
        return static::getModels(self::SITE_LINKS, SiteLinks::class);
    }

    public static function siteLinksClass(): string
    {
        return static::getModelsClass(self::SITE_LINKS, SiteLinks::class);
    }

    public static function siteLinksTable(): string
    {
        return static::getTable(self::SITE_LINKS, SiteLinks::TABLE);
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
        return static::getModelsClass(self::MENUS, Menus::class);
    }

    public static function menuItems()
    {
        return static::getModels(self::MENU_ITEMS, MenuItems::class);
    }

    public static function menuItemsClass(): string
    {
        return static::getModelsClass(self::MENU_ITEMS, MenuItems::class);
    }

    public static function pages(): Pages|RecordManager
    {
        return static::getModels(self::PAGES, Pages::class);
    }

    public static function pagesClass(): string
    {
        return static::getModelsClass(self::PAGES, Pages::class);
    }

    public static function pageSections(): PageSections|RecordManager
    {
        return static::getModels(self::PAGE_SECTIONS, PageSections::class);
    }

    public static function pageSectionsClass(): string
    {
        return static::getModelsClass(self::PAGE_SECTIONS, PageSections::class);
    }

    public static function pageBlocks(): PageBlocks|RecordManager
    {
        return static::getModels(self::PAGE_BLOCKS, PageBlocks::class);
    }

    public static function pageBlocksClass(): string
    {
        return static::getModelsClass(self::PAGE_BLOCKS, PageBlocks::class);
    }

    protected static function packageName(): string
    {
        return CmsServiceProvider::NAME;
    }
}
