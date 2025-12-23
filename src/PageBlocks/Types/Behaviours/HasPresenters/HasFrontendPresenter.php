<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours\HasPresenters;

use Marktic\Cms\PageBlocks\Types\Presenters\Frontend\BaseFrontendPresenter;

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
