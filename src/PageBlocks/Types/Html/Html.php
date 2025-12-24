<?php

namespace Marktic\Cms\PageBlocks\Types\Html;

use Marktic\Cms\PageBlocks\Types\AbstractType;
use Marktic\Cms\PageBlocks\Types\Html\Presenters\HtmlFormPresenter;

/**
 * Class AbstractType
 */
class Html extends AbstractType
{
    public const NAME = 'html';

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getAdminFormPresenterClass(): string
    {
        return HtmlFormPresenter::class;
    }
}
