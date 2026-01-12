<?php

declare(strict_types=1);

namespace Marktic\Cms\SitesRoles\Dto;

use Nip\Collections\Collection;
use Nip\Collections\CollectionInterface;

/**
 * @template TKey of string
 * @template-covariant T of SiteRole
 * @extends Collection<TKey, T>
 */
class SiteRolesCollection extends Collection
{
    const ROLE_DEFAULT = 'default';

    public static function fromConfig(array $config): self
    {
        $collection = new self();
        foreach ($config as $roleData) {
            $role = SiteRole::fromArray($roleData);
            $collection->add($role, $role->getName());
        }

        return $collection;
    }

    public function getMandatoryRoles(): SiteRolesCollection|CollectionInterface
    {
        return $this->filter(function (SiteRole $role) {
            return $role->isMandatory();
        });
    }
}
