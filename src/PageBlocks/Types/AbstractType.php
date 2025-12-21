<?php

namespace Marktic\Cms\PageBlocks\Types;

use Marktic\Cms\PageBlocks\Types\Behaviours\AbstractTypeTrait;
use ByTIC\Models\SmartProperties\Properties\Types\Generic;

/**
 * Class AbstractType
 */
abstract class AbstractType extends Generic
{
    public const TYPES_DIR = __DIR__;

    public const NAMESPACE = __NAMESPACE__;

    use AbstractTypeTrait;
}
