<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours\HasPresenters;

use Marktic\Cms\PageBlocks\Types\Presenters\Admin\BaseAdminPresenter;

trait HasAdminPresenter
{
    public function getAdminPresenter()
    {
        return $this->getPresenter('admin', $this->getAdminPresenterClass());
    }

    protected function getAdminPresenterClass(): string
    {
        return BaseAdminPresenter::class;
    }
}
