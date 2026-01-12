<?php

declare(strict_types=1);

namespace Marktic\Cms\Tests\SitesRoles\Dto;

use Marktic\Cms\SitesRoles\Dto\SiteRole;
use Marktic\Cms\Tests\TestCase;

class SiteRoleTest extends TestCase
{
    public function test_fromArray()
    {
        $data = [
            'name' => 'test_name',
            'label' => 'test_label',
            'unique' => true,
            'mandatory' => true,
        ];

        $role = SiteRole::fromArray($data);

        $this->assertEquals('test_name', $role->getName());
        $this->assertEquals('test_label', $role->getLabel());
        $this->assertTrue($role->isUnique());
        $this->assertTrue($role->isMandatory());
    }

    public function test_fromArray_defaults()
    {
        $data = [
            'name' => 'test_name',
            'label' => 'test_label',
        ];

        $role = SiteRole::fromArray($data);

        $this->assertEquals('test_name', $role->getName());
        $this->assertEquals('test_label', $role->getLabel());
        $this->assertFalse($role->isUnique());
        $this->assertFalse($role->isMandatory());
    }
}
