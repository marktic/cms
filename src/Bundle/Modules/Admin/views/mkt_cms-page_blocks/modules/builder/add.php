<?php

use ByTIC\Icons\Icons;
use Marktic\Cms\Utility\CmsModels; ?>

<div class="text-center">
    <a href="#" class="btn btn-xs btn-flat btn-primary add-block-btn"
       data-bs-toggle="modal" data-bs-target="#cms-blocks-add-modal">
        <?= Icons::plus(); ?>
        <?= CmsModels::pageBlocks()->getLabel('add'); ?>
    </a>
</div>
