<?php

use Marktic\Cms\Pages\Dto\PageBuilder\PageCol;

/** @var PageCol $builderCol */
$builderCol = $this->builderCol;
$blocks = $builderCol->getBlocks();
?>

<div class="page-blocks-list d-grid gap-3 py-3"
     data-section-id="<?= $builderCol->getParentRow()->getSection()->id; ?>"
     data-col-id="<?= $builderCol->getPos(); ?>"
     >
    <?php foreach ($blocks as $block): ?>
        <div class="page-block bg-white px-1 py-2 border" data-id="<?= $block->id ?>">
            <div class="d-flex">
                <div class="p-1">
                    <?= \ByTIC\Icons\Icons::arrowsAlt(); ?>
                </div>
                <div class="flex-grow-1">
                    <?= $block->getAdminPresenter(); ?>
                </div>
                <div class="dropdown">
                    <button class="btn btn-xs btn-outline-info dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <?= \ByTIC\Icons\Icons::ellipsisH(); ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?= $block->compileURL('edit'); ?>">
                                <?= translator()->trans('edit'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item jsConfirm" href="javascript:void(0);"
                               data-href="<?= $block->compileURL('delete'); ?>"
                               data-message="<?= translator()->trans('general.messages.confirm'); ?>"
                            >
                                <?= translator()->trans('delete'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
