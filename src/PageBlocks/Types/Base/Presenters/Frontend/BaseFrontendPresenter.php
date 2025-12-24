<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Presenters\Frontend;

/**
 *
 */
class BaseFrontendPresenter extends AbstractFrontendPresenter
{
    public function render(): string
    {
        return $this->getBlock()->getMetadata()->getContent();
    }
}