<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Actions\Find;

use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\Sites\Models\Sites;
use Marktic\Cms\SitesRoles\Actions\GetSiteRoles;
use Marktic\Cms\SitesRoles\Dto\SiteRole;
use Marktic\Cms\SitesRoles\Dto\SiteRolesCollection;

/**
 * @method Sites getRepository
 */
class CreateSitesForMandatoryRoles extends AbstractAction
{
    use HasSubject;

    public function execute()
    {
        $tenant = $this->getSubject();
        $roles = $this->getRoles();
        foreach ($roles as $role) {
            $this->createSiteForRole($tenant, $role);
        }
    }

    /**
     * @return SiteRolesCollection|SiteRole[]
     */
    protected function getRoles(): SiteRolesCollection
    {
        $roles = GetSiteRoles::available();
        return $roles->getMandatoryRoles();
    }

    protected function createSiteForRole($tenant, SiteRole $role)
    {
        $site = $this->getRepository()->getNew();
        $site->setName(' Site - '.$role->getLabel());
        $site->populateFromTenant($tenant);
        $site->setRole($role);
        $site->save();
        return $site;
    }
}