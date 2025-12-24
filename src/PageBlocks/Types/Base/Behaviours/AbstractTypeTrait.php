<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours;

use Marktic\Cms\PageBlocks\Types\Base\Behaviours\CanDelete\CanDeleteTrait;
use Marktic\Cms\PageBlocks\Types\Base\Behaviours\Generic\HasLabelTrait;
use Marktic\Cms\PageBlocks\Types\Base\Behaviours\HasIcon\HasIconTrait;
use Marktic\Cms\PageBlocks\Types\Base\Behaviours\HasPresenters\HasPresenters;
use Marktic\Cms\PageBlocks\Types\Base\Behaviours\IsUnique\UniqueTrait;

/**
 * Trait AbstractTypeTrait.
 */
trait AbstractTypeTrait
{
    use AbstractTypeInterfaceTrait;
    use HasLabelTrait;
    use HasIconTrait;
    use CanDeleteTrait;
    use UniqueTrait;

    use HasPresenters;
}
