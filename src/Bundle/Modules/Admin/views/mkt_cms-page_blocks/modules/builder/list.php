<?php

use Marktic\Cms\Pages\Dto\PageBuilder\PageCol;

/** @var PageCol $builderCol */
$builderCol = $this->builderCol;
$blocks = $builderCol->getBlocks();
?>

<div class="page-blocks-list d-grid gap-3">
    <?php if (count($blocks) < 1): ?>
        <div class="empty-list text-center p-3 border">
            +
        </div>
    <?php else: ?>
        <div class="list">
            <?php foreach ($blocks as $block): ?>
                <div class="page-block bg-white p-3 border">
                    <div class="dropdown float-end">
                        <button class="btn btn-xs btn-outline-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>⋮</strong>
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
                    <?= $block->getAdminPresenter(); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
