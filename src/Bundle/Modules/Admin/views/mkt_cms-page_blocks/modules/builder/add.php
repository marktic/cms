<?php

use ByTIC\Icons\Icons;
use Marktic\Cms\Utility\CmsModels; ?>

<div class="text-center">
    <a href="#" class="btn btn-flat-primary add-block-btn d-block border"
       data-bs-toggle="modal" data-bs-target="#cms-blocks-add-modal">
        <?= Icons::plus(); ?>
        <?= CmsModels::pageBlocks()->getLabel('add'); ?>
    </a>
</div>
