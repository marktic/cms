<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours;

use ByTIC\FormBuilder\Application\Models\Fields\Traits\FormFieldTrait;
use ByTIC\FormBuilder\Application\Models\Form\Traits\HasFieldsRecordTrait;
use ByTIC\FormBuilder\FormFields\Dto\FormFieldsDesigner;
use Marktic\Cms\PageBlocks\Models\PageBlock;
use Nip\Form\FormModel as NipModelForm;
use Nip\Records\Record;

/**
 * Trait AbstractTypeInterfaceTrait.
 */
trait AbstractTypeInterfaceTrait
{
    /**
     * @return string
     */
    abstract public function getName();

    /**
     * @param bool $short
     *
     * @return string
     */
    abstract public function getLabel($short = false);

    /**
     * @return Record|PageBlock
     */
    abstract public function getItem();

    abstract public function setCanDelete(bool $canDelete);

}
