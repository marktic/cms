<?php

use Marktic\Cms\Utility\CmsModels;

$blocksRepository = CmsModels::pageBlocks();
$blockTypes = $blocksRepository->getTypes();
?>

<div class="modal fade" id="cms-blocks-add-modal" tabindex="-1" aria-labelledby="cms-blocks-add-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cms-blocks-add-modal-label">
                    <?= $blocksRepository->getLabel('modal.title'); ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" data-block-add-url="<?= $blocksRepository->compileURL('add'); ?>">
                <div class="container">
                    <div class="row row-cols-2">
                        <?php foreach ($blockTypes as $blockType) : ?>
                            <div class="col">
                                <a href="javascript:" data-block-type="<?= $blockType->getName(); ?>"
                                   class="block-add d-block p-2 btn btn-outline-light">
                                    <div class="icon">
                                        <?= $blockType->getIconHtml(); ?>
                                    </div>
                                    <div class="label text-primary">
                                        <?= $blockType->getLabel(); ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
