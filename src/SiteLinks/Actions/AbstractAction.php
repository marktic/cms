<?php

namespace Marktic\Cms\SiteLinks\Actions;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\Entities\HasRepository;
use Marktic\Cms\SiteLinks\Models\SiteLinks;
use Marktic\Cms\Utility\CmsModels;
use Nip\Records\AbstractModels\RecordManager;

/**
 * @method SiteLinks getRepository
 */
abstract class AbstractAction extends Action
{
    use HasRepository;

    protected function generateRepository(): RecordManager
    {
        return CmsModels::siteLinks();
    }
}