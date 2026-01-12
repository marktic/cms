<?php

declare(strict_types=1);

namespace Marktic\Cms\SitesRoles\Dto;

use Stringable;

class SiteRole implements Stringable
{
    protected string $name;
    protected string $label;
    protected bool $unique = false;
    protected bool $mandatory = false;

    public function __construct(string $name, string $label, bool $unique = false, bool $mandatory = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->unique = $unique;
        $this->mandatory = $mandatory;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['label'],
            $data['unique'] ?? false,
            $data['mandatory'] ?? false
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function isUnique(): bool
    {
        return $this->unique;
    }

    public function isMandatory(): bool
    {
        return $this->mandatory;
    }

    public function __toString()
    {
        return $this->name;
    }
}
