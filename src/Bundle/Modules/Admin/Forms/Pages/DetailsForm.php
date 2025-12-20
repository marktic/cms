<?php

declare(strict_types=1);

namespace  Marktic\Cms\Bundle\Modules\Admin\Forms\Pages;

use Marktic\Cms\Bundle\Library\Form\FormModel;
use Marktic\Cms\Pages\Models\Page;

/**
 * @method Page getModel()
 */
class DetailsForm extends FormModel
{
    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-cms-pages-form');

        $this->initializeName();
        $this->initializeSlug();

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeName(): void
    {
        $this->addInput('name', translator()->trans('name'), true);
    }

    protected function initializeSlug(): void
    {
        $this->addInput('slug', translator()->trans('slug'), true);
    }
}
