<?php

namespace Marktic\Cms\PageBlocks\Types\Behaviours;

use Marktic\Cms\PageBlocks\Types\Behaviours\CanDelete\CanDeleteTrait;
use Marktic\Cms\PageBlocks\Types\Behaviours\Generic\HasLabelTrait;
use Marktic\Cms\PageBlocks\Types\Behaviours\HasIcon\HasIconTrait;
use Marktic\Cms\PageBlocks\Types\Behaviours\IsUnique\UniqueTrait;
use Nip\Records\Record;

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
}
