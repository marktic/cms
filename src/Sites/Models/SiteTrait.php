<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Models;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;
use Marktic\Cms\Base\Models\HasMetadata\RecordHasMetadataTrait;
use Marktic\Cms\Base\Models\HasTenant\HasTenantRecord;
use Marktic\Cms\Base\Models\Timestampable\TimestampableTrait;
use Marktic\Cms\Sites\Dto\SiteMetadata;
use Marktic\Cms\SitesRoles\Actions\GetSiteRoles;
use Marktic\Cms\SitesRoles\Dto\SiteRole;
use Nip\Records\Traits\HasUuid\HasUuidRecordTrait;

/**
 *
 * @property SiteMetadata $metadata
 * @method SiteMetadata getMetadata
 */
trait SiteTrait
{
    use HasTenantRecord;
    use TimestampableTrait;
    use HasUuidRecordTrait;
    use HasFormsRecordTrait;
    use RecordHasMetadataTrait;

    protected string $name = '';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getRole()
    {
        return $this->getMetadata()->getRole();
    }

    /**
     * @return SiteRole
     */
    public function getRoleObject()
    {
        return GetSiteRoles::available()->get($this->getRole());
    }

    public function setRole(SiteRole|string $role)
    {
        $role = $role instanceof SiteRole ? $role->getName() : $role;
        $this->getMetadata()->setRole($role);
        return $this;
    }

    protected function getMetadataClass(): ?string
    {
        return SiteMetadata::class;
    }
}
