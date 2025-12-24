<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Presenters\AdminForm;

use Marktic\Cms\Bundle\Modules\Admin\Forms\PageBlocks\DetailsForm;
use Marktic\Cms\PageBlocks\Models\PageBlock;
use Marktic\Cms\PageBlocks\Types\Base\Presenters\AbstractBase\AbstractBasePresenter;
use Nip\Records\AbstractModels\Record;

abstract class AbstractFormPresenter extends AbstractBasePresenter
{
    protected DetailsForm $form;

    public function setForm($form): static
    {
        $this->form = $form;
        return $this;
    }

    public function getForm(): DetailsForm
    {
        return $this->form;
    }

    public function getModel(): PageBlock
    {
        return $this->form->getModel();
    }

    public function initialize(): void
    {
    }

    public function getDataFromModel(): void
    {
    }

    public function processValidation(): void
    {
    }

    public function saveToModel(): void
    {
    }

    public function saveModel(): void
    {
    }
}