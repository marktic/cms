<?php

namespace Marktic\Cms\PageBlocks\Types\Texteditor;

use Marktic\Cms\PageBlocks\Types\AbstractType;

/**
 * Class Texteditor
 */
class Texteditor extends AbstractType
{
    public const NAME = 'texteditor';

    public function getName(): string
    {
        return self::NAME;
    }
}
