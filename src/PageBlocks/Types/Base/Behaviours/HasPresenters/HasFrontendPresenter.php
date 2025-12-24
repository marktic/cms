<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours\HasPresenters;

use Marktic\Cms\PageBlocks\Types\Base\Presenters\Frontend\BaseFrontendPresenter;

trait HasFrontendPresenter
{
    public function getFrontendPresenter()
    {
        return $this->getPresenter('frontend', $this->getFrontendPresenterClass());
    }

    protected function getFrontendPresenterClass(): string
    {
        return BaseFrontendPresenter::class;
    }
}
