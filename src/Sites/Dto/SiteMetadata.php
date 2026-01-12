<?php

declare(strict_types=1);

namespace Marktic\Cms\Sites\Dto;

use ByTIC\DataObjects\Casts\Metadata\Metadata;

class SiteMetadata extends Metadata
{
    public const KEY_ROLE = 'role';

    public function getRole(): ?string
    {
        return $this->get(self::KEY_ROLE);
    }

    public function setRole(?string $role): void
    {
        $this->set(self::KEY_ROLE, $role);
    }
}