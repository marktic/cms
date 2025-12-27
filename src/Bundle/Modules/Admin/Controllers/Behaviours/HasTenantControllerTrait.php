<?php

namespace Marktic\Cms\Bundle\Modules\Admin\Controllers\Behaviours;

use Marktic\Cms\Base\Models\Filters\TenantFilter;
use Nip\Records\Filters\Sessions\Session;

trait HasTenantControllerTrait
{
    public function tenant()
    {
        $this->doModelsListing();
    }

    protected function getRequestFilters($session = null)
    {
        $request = $this->getRequest();
        $request->setAttribute(TenantFilter::NAME, $this->getCmsTenantFromRequest());
        /** @var Session $filter */
        return parent::getRequestFilters($session);
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
