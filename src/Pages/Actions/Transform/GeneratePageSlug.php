<?php

namespace Marktic\Cms\Pages\Actions\Transform;

use Bytic\Actions\Action;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\Pages\Models\Page;
use Nip\Utility\Str;

/**
 * @method Page getSubject()
 */
class GeneratePageSlug extends Action
{
    use HasSubject;

    public function checkOrSet(): void
    {
        $slug = $this->getSubject()->getSlug();
        if (!empty($slug)) {
            return;
        }
        $slug = $this->generateSlug();
        $this->getSubject()->setSlug($slug);
    }

    public function generateSlug(): string
    {
        $pageName = $this->getSubject()->getName();
        $slug = Str::slug($pageName, '-');
        return $slug;
    }
}
