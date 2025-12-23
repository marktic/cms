<?php

namespace Marktic\Cms\PageBlocks\Types\Presenters\Frontend;

use Marktic\Cms\PageBlocks\Types\Presenters\AbstractBase\AbstractBasePresenter;

abstract class AbstractFrontendPresenter extends AbstractBasePresenter implements \Stringable
{
    abstract public function render(): string;

    public function __toString()
    {
        return $this->render();
    }
}