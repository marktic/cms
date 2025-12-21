<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours\IsUnique;

trait UniqueTrait
{

    public function isUnique(): bool
    {
        return false;
    }
}