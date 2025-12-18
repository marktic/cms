<?php

namespace Marktic\Cms\Base\Models\HasTenant;

/**
 * Trait HasTenantRepository
 * @package Paytic\Payments\Models\AbstractModels\HasTenant
 */
trait HasTenantRepository
{
    public function initRelations()
    {
        parent::initRelations();
        $this->initRelationsCms();
    }

    protected function initRelationsCms(): void
    {
        $this->initRelationsCmsTenant();
    }

    protected function initRelationsCmsTenant(): void
    {
        $this->morphTo('Tenant', ['morphPrefix' => 'tenant', 'morphTypeField' => 'tenant']);
    }
}
