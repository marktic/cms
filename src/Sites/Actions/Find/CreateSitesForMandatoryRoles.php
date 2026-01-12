<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Actions\Find;

use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\Sites\Models\Site;
use Marktic\Cms\Sites\Models\Sites;
use Marktic\Cms\SitesRoles\Actions\GetSiteRoles;
use Marktic\Cms\SitesRoles\Dto\SiteRole;
use Marktic\Cms\SitesRoles\Dto\SiteRolesCollection;
use Nip\Records\AbstractModels\Record;

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
            $this->checkSiteForRole($tenant, $role);
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

    protected function checkSiteForRole($tenant, mixed $role): Site|Record
    {
        $find = GetSiteForTenantByRole::for($tenant)->withRole($role->getName())->fetch();
        if ($find) {
            return $find;
        }
        return $this->createSiteForRole($tenant, $role);
    }

    protected function createSiteForRole($tenant, SiteRole $role)
    {
        $site = $this->getRepository()->getNew();
        $site->setName(' Site - ' . $role->getLabel());
        $site->populateFromTenant($tenant);
        $site->setRole($role);
        $site->save();
        return $site;
    }

}