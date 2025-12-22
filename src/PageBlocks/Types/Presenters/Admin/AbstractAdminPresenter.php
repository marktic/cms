<?php

namespace Marktic\Cms\PageBlocks\Types\Presenters\Admin;

use Marktic\Cms\PageBlocks\Types\Presenters\AbstractBase\AbstractBasePresenter;

abstract class AbstractAdminPresenter extends AbstractBasePresenter implements \Stringable
{

    public function render(): string
    {
        // return a html representation of the block for admin view
        return '<div class="page-block bg-light p-3 border">'
            . '<h6>' . $this->block->getTitle() . '</h6>'
            . '</div>';
    }

    public function __toString()
    {
        return $this->render();
    }
}