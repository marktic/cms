<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Behaviours\CanDelete;

trait CanDeleteTrait
{
    protected $canDelete = null;

    /**
     * {@inheritdoc}
     */
    public function setCanDelete(bool $canDelete): void
    {
        $this->canDelete = $canDelete;
    }

    /**
     * @return bool
     */
    public function canDelete(): bool
    {
        $this->guardCanDelete();

        return true === $this->canDelete;
    }

    protected function guardCanDelete()
    {
        if ($this->canDelete === null) {
            $this->canDelete = $this->canDeleteDefault();
        }
    }

    protected function canDeleteDefault(): bool
    {
        return true;
    }
}