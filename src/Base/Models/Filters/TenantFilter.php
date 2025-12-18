<?php

namespace Marktic\Cms\Base\Models\Filters;

use Nip\Database\Query\AbstractQuery;
use Nip\Database\Query\Select as SelectQuery;
use Nip\HelperBroker;
use Nip\Records\Filters\Column\AbstractFilter;
use Nip\Records\Filters\Column\FilterInterface;
use Nip\Records\Locator\ModelLocator;
use Nip\Records\Record;

/**
 * Class TenantFilter
 * @package Marktic\Cms\Base\Models\Filters
 */
class TenantFilter extends AbstractFilter implements FilterInterface
{

    /**
     * @param SelectQuery $query
     */
    public function filterQuery($query)
    {
        $tenant = $this->getTenantRecord();

        $query->where("tenant = ?", $tenant->getManager()->getMorphName());
        $query->where('tenant_id = ?', $tenant->getId());
    }

    /**
     * @return Record
     */
    protected function getTenantRecord()
    {
        $record = $this->getValue();

        return $record;
    }
}
