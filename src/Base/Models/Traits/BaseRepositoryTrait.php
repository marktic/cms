<?php

declare(strict_types=1);

namespace Marktic\Cms\Base\Models\Traits;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordsTrait;
use Marktic\Cms\Base\Models\Timestampable\TimestampableManagerTrait;

trait BaseRepositoryTrait
{
    use HasFormsRecordsTrait;
    use TimestampableManagerTrait;
    use HasDatabaseConnectionTrait;

    protected function initRelations()
    {
        parent::initRelations();

        $this->initRelationsCms();
    }

    protected function initRelationsCms()
    {
    }

    protected function generateController(): string
    {
        if (\defined('static::CONTROLLER')) {
            return static::CONTROLLER;
        }

        return $this->getTable();
    }
}