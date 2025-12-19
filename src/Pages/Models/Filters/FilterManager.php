<?php

namespace Marktic\Cms\Pages\Models\Filters;

use Marktic\Cms\Base\Models\Filters\TenantFilter;

/**
 * Class FilterManager
 * @package Marktic\Cms\Pages\Models\Filters
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
