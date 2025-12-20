<?php

use Marktic\Cms\Utility\CmsModels;

$pageBuilder = CmsModels::pages();
?>

<div class="page-builder">
    <h3 class="fw-bold text-uppercase text-center my-4">
        <?= $pageBuilder->getLabel('title.page_builder') ?>
    </h3>

    <?= $this->load('/mkt_cms-page_sections/modules/builder/add'); ?>
    <?= $this->load('/mkt_cms-page_sections/modules/builder/list'); ?>
    <?= $this->load('/mkt_cms-page_sections/modules/builder/add'); ?>
</div>
