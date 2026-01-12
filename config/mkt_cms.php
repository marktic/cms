<?php

use Marktic\Cms\MenuItems\Models\MenuItems;
use Marktic\Cms\Menus\Models\Menus;
use Marktic\Cms\PageBlocks\Models\PageBlocks;
use Marktic\Cms\PageBlocks\Types\AbstractType;
use Marktic\Cms\Pages\Models\Pages;
use Marktic\Cms\PageSections\Models\PageSections;
use Marktic\Cms\SiteLinks\Models\SiteLinks;
use Marktic\Cms\Sites\Models\Sites;
use Marktic\Cms\Utility\CmsModels;
use Marktic\Cms\Utility\PathsHelpers;

return [
    'models' => array(
        CmsModels::SITES => Sites::class,
        CmsModels::SITE_LINKS => SiteLinks::class,
        CmsModels::MENUS => Menus::class,
        CmsModels::MENU_ITEMS => MenuItems::class,
        CmsModels::PAGES => Pages::class,
        CmsModels::PAGE_SECTIONS => PageSections::class,
        CmsModels::PAGE_BLOCKS => PageBlocks::class,
    ),
    'tables' => [
        CmsModels::SITES => Sites::TABLE,
        CmsModels::SITE_LINKS => SiteLinks::TABLE,
        CmsModels::MENUS => Menus::TABLE,
        CmsModels::MENU_ITEMS => MenuItems::TABLE,
        CmsModels::PAGES => Pages::TABLE,
        CmsModels::PAGE_SECTIONS => PageSections::TABLE,
        CmsModels::PAGE_BLOCKS => PageBlocks::TABLE,
    ],
    'database' => [
        'connection' => 'main',
        'migrations' => true,
    ],
    'blocks' => [
        'discovery' => [
            'cms' => [
                'namespace' => AbstractType::NAMESPACE,
                'path' => PathsHelpers::basePath() . '/src/PageBlocks/Types',
            ],
        ],
    ],
    'site_roles' => [
        'default' => [
            'name' => 'default',
            'label' => 'Default',
            'unique' => false,
            'mandatory' => true,
        ],
    ],
];
