<?php

namespace Marktic\Cms\Bundle\Modules\Frontend\Controllers;

use Marktic\Cms\Utility\ViewHelper;

trait AbstractCmsControllerTrait
{
    protected function bootAbstractCmsControllerTrait(): void
    {
        $this->after(
            function () {
                $this->registerCmsViewPaths();
            }
        );
    }

    protected function registerCmsViewPaths(): void
    {
        $view = $this->getView();
        ViewHelper::registerFrontendPaths($view);
    }
}

