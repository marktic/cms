<?php

use Marktic\Cms\Utility\CmsModels;

$pageBuilder = CmsModels::pages();
?>

<div class="page-builder">
    <h3>
        <?= $pageBuilder->getLabel('title.page_builder') ?>
    </h3>

    <?= $this->load('/mkt_cms-page_sections/modules/builder/add'); ?>
    <?= $this->load('/mkt_cms-page_sections/modules/builder/list'); ?>
</div>
