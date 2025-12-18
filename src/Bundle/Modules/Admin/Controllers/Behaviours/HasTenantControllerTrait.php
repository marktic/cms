<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers\Behaviours;

trait HasTenantControllerTrait
{
    protected function getRequestFilters($session = null)
    {
        $filter = parent::getRequestFilters($session);
        $filter->set('tenant', $this->getCmsTenantFromRequest());
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
