<?php

namespace Marktic\Cms\PageBlocks\Types\Html\Presenters;

use Marktic\Cms\PageBlocks\Dto\PageBlocksMetadata;
use Marktic\Cms\PageBlocks\Types\Base\Presenters\AdminForm\ContentFormPresenter;

class HtmlFormPresenter extends ContentFormPresenter
{
    protected function initializeContentField(): void
    {
        $this->form->addTexteditor(PageBlocksMetadata::KEY_CONTENT, translator()->trans('content'), true);
    }
}
