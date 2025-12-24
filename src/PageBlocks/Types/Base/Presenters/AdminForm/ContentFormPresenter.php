<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Presenters\AdminForm;

use Marktic\Cms\PageBlocks\Dto\PageBlocksMetadata;

class ContentFormPresenter extends AbstractFormPresenter
{
    public function initialize(): void
    {
        parent::initialize();
        $this->initializeContentField();
    }

    protected function initializeContentField(): void
    {
        $this->form->addTextarea(PageBlocksMetadata::KEY_CONTENT, translator()->trans('content'), true);
    }

    public function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $this->form->getElement(PageBlocksMetadata::KEY_CONTENT)
            ->setValue($this->getModel()->getMetadata()->getContent());
    }

    public function saveToModel(): void
    {
        parent::saveToModel();
        $content = $this->form->getElement(PageBlocksMetadata::KEY_CONTENT)->getValue();
        $this->getModel()->getMetadata()->setContent($content);
    }
}
