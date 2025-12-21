<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours\HasIcon;

use ByTIC\FormBuilder\FormFieldTypes\Icons\FieldIcons;

trait HasPhoneIconTrait
{

    protected function getDefaultIcon(): string
    {
        return FieldIcons::PHONE;
    }
}