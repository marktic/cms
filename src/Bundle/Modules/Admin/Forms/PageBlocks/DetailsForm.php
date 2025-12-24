<?php

declare(strict_types=1);

namespace Marktic\Cms\Bundle\Modules\Admin\Forms\PageBlocks;

use Marktic\Cms\Bundle\Library\Form\FormModel;
use Marktic\Cms\PageBlocks\Models\PageBlock;
use Marktic\Cms\PageBlocks\Types\Base\Presenters\AdminForm\AbstractFormPresenter;

/**
 * @method PageBlock getModel()
 */
class DetailsForm extends FormModel
{
    protected $typeObject = null;
    protected AbstractFormPresenter $typePresenter;

    public function initialize()
    {
        parent::initialize();
        $this->setAttrib('id', 'mkt-cms-page_blocks-form');

        $this->initializeTitle();

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeTitle(): void
    {
        $this->addInput('title', translator()->trans('title'), true);
    }


    protected function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $this->typeObject = $this->getModel()->getType();
        $this->typePresenter = $this->typeObject->getAdminFormPresenter();
        $this->typePresenter->setForm($this);
        $this->typePresenter->initialize();
        $this->typePresenter->getDataFromModel();
    }

    public function processValidation(): void
    {
        parent::processValidation();
        $this->typePresenter->processValidation();
    }


    public function saveToModel(): void
    {
        parent::saveToModel();
        $this->typePresenter->saveToModel();
    }

    public function saveModel(): void
    {
        parent::saveModel();
        $this->typePresenter->saveModel();
    }
}
