<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours\Generic;

trait HasLabelTrait
{
    /**
     * @return string
     */
    public function generateLabel()
    {
        return $this->getDefaultLabel();
    }

    /**
     * @return string
     */
    public function getDefaultLabel()
    {
        return $this->getName();
    }

    /**
     * {@inheritdoc}
     */
    protected function hasShortLabel()
    {
        return false;
    }
}