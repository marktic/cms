<?php

declare(strict_types=1);

namespace  Marktic\Cms\Bundle\Modules\Admin\Forms\PageSections;

use Marktic\Cms\Bundle\Library\Form\FormModel;
use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\PageSections\Dto\PageSectionCols;
use Marktic\Cms\PageSections\Models\PageSection;

/**
 * @method PageSection getModel()
 */
class DetailsForm extends FormModel
{
    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-cms-page_sections-form');

        $this->initializeTitle();
        $this->initializeCols();

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeTitle(): void
    {
        $this->addInput('title', translator()->trans('title'), true);
    }

    protected function initializeCols(): void
    {
        $this->addSelect('cols', translator()->trans('cols'), true);
        /** @var \Nip_Form_Element_Select $element */
        $element = $this->getElement('cols');
        foreach (PageSectionCols::cases() as $case) {
            $element->addOption($case->value, $case->getLabel());
        }
    }

    protected function getDataFromModel(): void
    {
        parent::getDataFromModel();
        $cols = $this->getModel()->getMetadata()->getCols();
        $this->getElement('cols')->setValue($cols);
    }

    public function saveToModel()
    {
        parent::saveToModel();

        $cols = $this->getElement('cols')->getValue();
        $this->getModel()->getMetadata()->setCols($cols);
    }
}
