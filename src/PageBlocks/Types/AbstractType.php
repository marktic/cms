<?php

namespace Marktic\Cms\PageBlocks\Types;

use ByTIC\Models\SmartProperties\Properties\Types\Generic;
use Marktic\Cms\PageBlocks\Types\Base\Behaviours\AbstractTypeTrait;

/**
 * Class AbstractType
 */
abstract class AbstractType extends Generic
{
    public const TYPES_DIR = __DIR__;

    public const NAMESPACE = __NAMESPACE__;

    use AbstractTypeTrait;
}
