<?php

namespace Marktic\Cms\PageBlocks\Types\Presenters\AbstractBase;

use Marktic\Cms\PageBlocks\Models\PageBlock;
use Marktic\Cms\PageBlocks\Types\AbstractType;

abstract class AbstractBasePresenter
{
    protected PageBlock $block;

    protected AbstractType $type;

    public function setType(AbstractType $type): static
    {
        $this->type = $type;
        $this->block = $type->getItem();
        return $this;
    }

    public function getType(): AbstractType
    {
        return $this->type;
    }

    public function getBlock(): PageBlock
    {
        return $this->block;
    }
}