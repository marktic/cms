<?php

namespace Marktic\Cms\Base\Models\HasTenant;

use Nip\Records\Record;

/**
 * Trait HasTenantRecord
 * @package Marktic\Cms\Base\Models\HasTenant
 *
 * @method Record getTenant
 */
trait HasTenantRecord
{
    public string|int $tenant_id;
    public string $tenant;

    /**
     * @param Record $record
     */
    public function populateFromTenant($record)
    {
        $this->tenant_id = $record->id;
        $this->tenant = $record->getManager()->getMorphName();
    }
}
