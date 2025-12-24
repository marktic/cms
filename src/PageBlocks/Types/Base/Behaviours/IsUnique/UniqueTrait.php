<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours\IsUnique;

trait UniqueTrait
{

    public function isUnique(): bool
    {
        return false;
    }
}