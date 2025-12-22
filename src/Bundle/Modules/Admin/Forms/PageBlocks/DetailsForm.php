<?php

declare(strict_types=1);

namespace  Marktic\Cms\Bundle\Modules\Admin\Forms\PageBlocks;

use Marktic\Cms\Bundle\Library\Form\FormModel;
use Marktic\Cms\PageBlocks\Models\PageBlock;

/**
 * @method PageBlock getModel()
 */
class DetailsForm extends FormModel
{
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
//        $cols = $this->getModel()->getMetadata()->getCols();
//        $this->getElement('cols')->setValue($cols);
    }

    public function saveToModel()
    {
        parent::saveToModel();

//        $cols = $this->getElement('cols')->getValue();
//        $this->getModel()->getMetadata()->setCols($cols);
    }
}
