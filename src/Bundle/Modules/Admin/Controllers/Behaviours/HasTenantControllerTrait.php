<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers\Behaviours;

use Nip\Records\Filters\Sessions\Session;

trait HasTenantControllerTrait
{
    public function tenant()
    {
        $this->doModelsListing();
    }

    protected function getRequestFilters($session = null)
    {
        /** @var Session $filter */
        $filter = parent::getRequestFilters($session);
        $data = $filter->getData();
        $data['tenant'] = $this->getCmsTenantFromRequest();
        $filter->initWithData($data);
        return $filter;
    }

    /**
     * @return mixed
     */
    protected function getCmsTenantFromRequest()
    {
        $tenantName = $this->getRequest()->get('tenant');
        return $this->checkForeignModelFromRequest($tenantName, ['tenant_id', 'id']);
    }
}
