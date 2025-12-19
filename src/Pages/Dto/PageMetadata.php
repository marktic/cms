<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Dto;

use ByTIC\DataObjects\Casts\Metadata\Metadata;

class PageMetadata extends Metadata
{
    public const KEY_ROLE = 'role';
    const ROLE_HOMEPAGE = 'homepage';

    public function getRole(): ?string
    {
        return $this->get(self::KEY_ROLE);
    }

    public function setRole(?string $role): void
    {
        $this->set(self::KEY_ROLE, $role);
    }
}