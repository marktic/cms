<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers;

use Marktic\Cms\Utility\ViewHelper;

trait AbstractCmsControllerTrait
{


    protected function bootAbstractCmsControllerTrait()
    {
        $this->after(
            function () {
                $this->registerCmsViewPaths();
            }
        );
    }

    protected function registerCmsViewPaths()
    {
        $view = $this->getView();
        ViewHelper::registerAdminPaths($view);
    }
}

