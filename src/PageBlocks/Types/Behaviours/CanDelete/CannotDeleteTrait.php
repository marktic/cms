<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours\CanDelete;

/**
 *
 */
trait CannotDeleteTrait
{

    protected function canDeleteDefault(): bool
    {
        return false;
    }
}