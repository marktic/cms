<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours\CanDelete;

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