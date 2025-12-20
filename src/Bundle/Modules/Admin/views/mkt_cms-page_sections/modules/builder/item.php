<?php
/** @var PageSection $section */

use Marktic\Cms\PageSections\Actions\PageSectionBoostrapColClasses;
use Marktic\Cms\PageSections\Models\PageSection;

$section = $section ?? $this->section;
$cols = $section->getMetadata()->getCols();
$colsClasses = PageSectionBoostrapColClasses::for($section)->get();
?>
<div class="page_section border" data-section_id="<?= $section->id ?>">
    <div class="section_header bg-light d-flex">
        <h5 class="section_title fw-bold flex-grow-1 px-4 py-2 m-0">
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
    <div class="section_content">
        <div class="row">
            <?php for ($col = 1; $col <= $cols; $col++): ?>
                <div class="<?= $colsClasses ?>">
                    <div class="p-4 border bg-white">
                        Column <?= $col ?> content
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
