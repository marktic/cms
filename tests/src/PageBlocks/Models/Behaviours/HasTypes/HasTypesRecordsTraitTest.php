<?php

namespace Marktic\Cms\Tests\PageBlocks\Models\Behaviours\HasTypes;

use Marktic\Cms\PageBlocks\Models\PageBlocks;
use Marktic\Cms\PageBlocks\Types\Html\Html;
use Marktic\Cms\Tests\TestCase;

class HasTypesRecordsTraitTest extends TestCase
{
    public function test_getTypes()
    {
        $this->loadConfigFromFixture('base');

        $repository = new PageBlocks();
        $types = $repository->getTypes();

        self::assertIsArray($types);
        self::assertCount(2, $types);

        $typeHtml = $types['html'];
        self::assertEquals('html', $typeHtml->getName());
        self::assertInstanceOf(Html::class, $typeHtml);
    }
}
