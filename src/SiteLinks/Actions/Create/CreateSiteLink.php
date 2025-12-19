<?php

declare(strict_types=1);

namespace Marktic\Cms\SiteLinks\Actions\Create;

use Marktic\Cms\SiteLinks\Actions\AbstractAction;
use Marktic\Cms\SiteLinks\Models\SiteLink;
use Marktic\Cms\Sites\Models\Site;
use Nip\Records\AbstractModels\Record;

class CreateSiteLink extends AbstractAction
{
    protected Site $site;
    protected Record $link;

    public static function for(Site $site, Record $link): self
    {
        $action = new self();
        $action->site = $site;
        $action->link = $link;
        return $action;
    }

    public function create(): Record|SiteLink
    {
        $record = $this->getRepository()->getNew();
        $record->site_id = $this->site->id;
        $record->link_id = $this->link->id;
        $record->link_type = $this->link->getManager()->getMorphName();
        $record->save();
        return $record;
    }
}