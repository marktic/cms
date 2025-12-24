<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours;

use Marktic\Cms\PageBlocks\Models\PageBlock;
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
