<?php

namespace Marktic\Cms\Sites\Actions\Find;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\Entities\HasRepository;
use Marktic\Cms\Utility\CmsModels;
use Nip\Records\AbstractModels\RecordManager;

abstract class AbstractAction extends Action
{
    use HasRepository;

    protected function generateRepository(): RecordManager
    {
        return CmsModels::sites();
    }
}