<?php

namespace Marktic\Cms\Base\Actions\Find;

use Nip\Records\Record;

trait HasTenantTrait
{
    abstract function getTenant(): Record;

    protected function findParams(): array
    {
        $params = [];
        $params = $this->findParamsTenant($params);
        return $params;
    }

    protected function findParamsTenant($params): array
    {
        $tenant = $this->getTenant();
        $params['where'][] = ['tenant = ?', $tenant->getManager()->getMorphName()];
        $params['where'][] = ['tenant_id = ?', $tenant->id];

        return $params;
    }

    protected function orCreateData($data)
    {
        $data = $this->orCreateDataTenant($data);
        return $data;
    }

    protected function orCreateDataTenant($data)
    {
        $tenant = $this->getTenant();
        $data['tenant'] = $tenant->getManager()->getMorphName();
        $data['tenant_id'] = $tenant->id;
        return $data;
    }
}