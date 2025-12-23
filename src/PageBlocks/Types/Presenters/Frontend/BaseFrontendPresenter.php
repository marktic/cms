<?php

namespace Marktic\Cms\PageBlocks\Types\Presenters\Frontend;

/**
 *
 */
class BaseFrontendPresenter extends AbstractFrontendPresenter
{
    public function render(): string
    {
        return $this->getBlock()->getContent();
    }
}