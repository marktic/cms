<?php

use Marktic\Cms\Pages\Dto\PageBuilder\PageCol;
use Marktic\Cms\Utility\CmsModels;

/** @var PageCol $builderCol */
$builderCol = $this->builderCol;
$blocks = $builderCol->getBlocks();
?>

<?php if (count($blocks) < 1): ?>
    <?= $this->load(CmsModels::pageBlocks()->getMessage('dnx')); ?>
<?php else: ?>
    <div class="page-blocks-list d-grid gap-3" >
        <?php foreach ($blocks as $block): ?>
            <?= $block->getAdminPresenter(); ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
