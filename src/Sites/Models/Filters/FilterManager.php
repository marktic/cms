<?php

namespace Marktic\Cms\Sites\Models\Filters;

use Marktic\Cms\Base\Models\Filters\TenantFilter;

/**
 * Class FilterManager
 * @package KM42\Common\Models\Events\Newsletters\Filters
 */
class FilterManager extends \Nip\Records\Filters\FilterManager
{
    public function init()
    {
        parent::init();

        $this->addFilter(
            new TenantFilter()
        );
    }
}
