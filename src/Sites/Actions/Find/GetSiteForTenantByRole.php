<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Actions\Find;

use Bytic\Actions\Behaviours\Entities\FindRecord;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\Base\Actions\Find\HasTenantTrait;
use Marktic\Cms\Sites\Dto\SiteMetadata;
use Nip\Records\Record;

class GetSiteForTenantByRole extends AbstractAction
{
    protected string $role = SiteMetadata::ROLE_DEFAULT;

    use HasSubject;
    use FindRecord, HasTenantTrait;

    public function withRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    protected function findParams(): array
    {
        $params = [];
        $params = $this->findParamsTenant($params);
        $params['where']['role'] = ['JSON_EXTRACT(`metadata`, "$.role") = ?', $this->role];
        return $params;
    }

    protected function orCreateData($data): array
    {
        $data = $this->orCreateDataTenant($data);
        $data['metadata']['role'] = $this->role;
        return $data;
    }

    function getTenant(): Record
    {
        return $this->getSubject();
    }
}
