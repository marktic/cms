<?php

declare(strict_types=1);

namespace Marktic\Cms\Pages\Actions\Find;

use Bytic\Actions\Behaviours\Entities\FindRecord;
use Bytic\Actions\Behaviours\HasSubject\HasSubject;
use Marktic\Cms\Base\Actions\Find\HasTenantTrait;
use Marktic\Cms\Pages\Dto\PageMetadata;
use Marktic\Cms\SiteLinks\Actions\Create\CreateSiteLink;
use Marktic\Cms\SiteLinks\Actions\Find\GetSiteLinksBySite;
use Marktic\Cms\Sites\Models\Site;
use Marktic\Cms\Utility\CmsModels;
use Nip\Records\Record;

/**
 * @method Site getSubject()
 */
class GetPageForSiteByRole extends AbstractAction
{
    protected string $role = PageMetadata::ROLE_HOMEPAGE;

    use HasSubject;
    use FindRecord {
        FindRecord::createRecord as createRecordTrait;
    }
    use HasTenantTrait;


    protected function findParams(): array
    {
        $params = [];
        $params = $this->findParamsTenant($params);

        $siteLinks = GetSiteLinksBySite::for($this->getSubject())
            ->withLinkType(CmsModels::pages()->getMorphName())
            ->fetch();
        $sitePageIds = $siteLinks->pluck('link_id')->toArray();
        $params['where'][] = ['id IN ?', $sitePageIds];
        $params['where']['role'] = ['JSON_EXTRACT(`metadata`, "$.role") = ?', $this->role];
        return $params;
    }

    protected function orCreateData($data): array
    {
        $data = $this->orCreateDataTenant($data);
        $data['name'] = $data['name'] ?? ucfirst($this->role) . ' Page';
        $data['metadata'] = json_encode(['role' => $this->role]);
        return $data;
    }

    protected function createRecord($data): \Nip\Records\AbstractModels\Record
    {
        $record = $this->createRecordTrait($data);
        CreateSiteLink::for($this->getSubject(), $record)->create();
        return $record;
    }

    function getTenant(): Record
    {
        return $this->getSubject()->getTenant();
    }
}
