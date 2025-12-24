<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours\HasPresenters;

use Marktic\Cms\PageBlocks\Types\Base\Presenters\AdminForm\AbstractFormPresenter;
use Marktic\Cms\PageBlocks\Types\Base\Presenters\AdminForm\ContentFormPresenter;

trait HasFormPresenter
{
    public function getAdminFormPresenter(): AbstractFormPresenter
    {
        return $this->getPresenter('adminForm', $this->getAdminFormPresenterClass());
    }

    protected function getAdminFormPresenterClass(): string
    {
        return ContentFormPresenter::class;
    }
}
