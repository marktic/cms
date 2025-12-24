<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Presenters\Admin;

use Marktic\Cms\PageBlocks\Types\Base\Presenters\AbstractBase\AbstractBasePresenter;

abstract class AbstractAdminPresenter extends AbstractBasePresenter implements \Stringable
{

    public function render(): string
    {
        return '<h6 class="block-title">' . $this->block->getTitle() . '</h6>';
    }

    public function __toString()
    {
        return $this->render();
    }
}