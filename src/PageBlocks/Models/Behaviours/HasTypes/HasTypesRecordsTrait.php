<?php

namespace Marktic\Cms\PageBlocks\Models\Behaviours\HasTypes;

use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordsTrait as HasTypesTrait;
use Marktic\Cms\Utility\PackageConfig;

trait HasTypesRecordsTrait
{
    use HasTypesTrait;

    public function getTypeItemsDirectory(): array
    {
        $config = PackageConfig::blocksDiscovery();
        $result = [];
        foreach ($config as $type => $data) {
            $result[$data['namespace']] = $data['path'];
        }
        return $result;
    }
}
