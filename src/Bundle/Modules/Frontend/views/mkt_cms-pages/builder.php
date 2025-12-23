<?php
/** @var \Marktic\Cms\Pages\Dto\PageBuilder\PageBuilder $pageBuilder */
$pageBuilder = $this->pageBuilder;
$rows = $pageBuilder->getRows();
?>
<div class="mkt-page-builder-container">
    <?php foreach ($rows as $row): ?>
        <?php
        $section = $row->getSection();
        $cols = $row->getCols();
        ?>
        <div class="mkt-page-builder-row">
            <h3>
                <?= $section->getName(); ?>
            </h3>
            <div class="row">
                <?php foreach ($cols as $col): ?>
                    <?php
                    $blocks = $col->getBlocks();
                    ?>
                    <div class="<?= implode(' ', $col->getCssClasses()); ?>">
                        <?php foreach ($blocks as $block): ?>
                            <?php
                                $presenter = $block->getFrontendPresenter();
                                if (method_exists($presenter, 'withView')) {
                                    $presenter->withView($this);
                                }
                            ?>
                            <div class="mkt-page-builder-block">
                                <h4 class="mkt-page-builder-block-title">
                                    <?= $block->getTitle(); ?>
                                </h4>
                                <div class="content">
                                    <?= $presenter; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
