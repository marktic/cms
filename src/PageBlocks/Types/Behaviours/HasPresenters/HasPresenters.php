<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours\HasPresenters;

use Marktic\Cms\PageBlocks\Types\Presenters\AbstractBase\AbstractBasePresenter;

trait HasPresenters
{
    use HasAdminPresenter;
    use HasFormPresenter;
    use HasFrontendPresenter;
    protected array $presenters = [];

    protected function getPresenter($key, $class = null)
    {
        if (!array_key_exists($key, $this->presenters)) {
            if ($class && class_exists($class)) {
                $this->presenters[$key] = $this->initNewPresenter($class);
            }
        }
        return $this->presenters[$key] ?? null;
    }

    protected function initNewPresenter($class): AbstractBasePresenter
    {
        /** @var AbstractBasePresenter $presenter */
        $presenter = new $class();
        $presenter->setType($this);
        return $presenter;
    }
}
