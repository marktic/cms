<?php
/** @var PageSection $section */

use Marktic\Cms\Pages\Dto\PageBuilder\PageRow;
use Marktic\Cms\PageSections\Models\PageSection;

$section = $section ?? $this->section;

/** @var PageRow $builderRow */
$builderRow = $this->pageBuilder->forSection($section);
$builderCols = $builderRow->getCols();
?>
<div class="page_section border shadow-sm" data-id="<?= $section->id ?>" >
    <div class="section_header bg-light d-flex">
        <h5 class="section_title fw-bold flex-grow-1 px-4 py-2 m-0">
            <?= \ByTIC\Icons\Icons::arrowsAlt(); ?>

            <a href="<?= $section->getURL(); ?>">
                <?= $section->getTitle() ?: 'No title' ?>
            </a>
        </h5>
        <div class="section_actions p-2">
            <a href="<?= $section->compileURL('edit'); ?>"
               class="btn btn-xs btn-outline-info edit_section_button">
                Edit
            </a>
            <a href="<?= $section->compileURL('delete') ?>"
               class="btn btn-xs btn-outline-danger delete_section_button">
                Delete
            </a>
        </div>
    </div>
    <div class="section_content bg-white p-4">
        <div class="row">
            <?php foreach ($builderCols as $builderCol): ?>
                <div class="<?= implode(' ', $builderCol->getCssClasses()); ?> section-col"
                     data-col="<?= $builderCol->getPos() ?>">
                    <div class="inner border border-primary-subtle border-opacity-25"
                         style="border-style: dotted !important;">
                        <div class="px-3 py-1 border-bottom bg-primary" style="--bs-bg-opacity: .2;">
                            <strong>
                                COL <?= $builderCol->getPos(); ?>
                            </strong>
                        </div>

                        <div class="bg-light p-2">
                            <?= $this->load('/mkt_cms-page_blocks/modules/builder/list', ['builderCol' => $builderCol]); ?>
                        </div>

                        <div class="p-1 border-top bg-primary" style="--bs-bg-opacity: .05;">
                            <?= $this->load('/mkt_cms-page_blocks/modules/builder/add'); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
