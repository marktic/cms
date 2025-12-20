<?php

declare(strict_types=1);

namespace  Marktic\Cms\Bundle\Modules\Admin\Forms\PageSections;

use Marktic\Cms\Bundle\Library\Form\FormModel;
use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\PageSections\Dto\PageSectionCols;

/**
 * @method Page getModel()
 */
class DetailsForm extends FormModel
{
    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-cms-page_sections-form');

        $this->initializeTitle();

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeTitle(): void
    {
        $this->addInput('name', translator()->trans('name'), true);
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
}
