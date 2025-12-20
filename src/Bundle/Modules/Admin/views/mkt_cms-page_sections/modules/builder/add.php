<?php

use Marktic\Cms\Utility\CmsModels;

$page = $page ?? $this->item;
$pageSectionRepository = CmsModels::pageSections();
?>

<div class="bg-light p-3 mb-3 rounded">
    <div class="dropdown">
        <a class="btn btn-secondary"
           href="<?= $pageSectionRepository->compileURL('add', ['page_id' => $page->id]) ?>"
        >
            <?= $pageSectionRepository->getLabel('add'); ?>
        </a>
    </div>
</div>
