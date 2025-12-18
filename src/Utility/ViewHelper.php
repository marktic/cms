<?php

namespace Marktic\Cms\Utility;

use Marktic\Cms\Utility\PathsHelpers;
use Nip\View\View;

/**
 * Class ViewHelper.
 */
class ViewHelper
{
    public const NAMESPACE = 'MktCMS';
    /**
     * @param View|PageControllerFormBuilderViewPathsTrait $view
     */
    public static function registerAdminPaths(View $view)
    {
        $view->addPath(PathsHelpers::viewsAdmin(), self::NAMESPACE);
        $view->addPath(PathsHelpers::viewsAdmin());
    }
}
