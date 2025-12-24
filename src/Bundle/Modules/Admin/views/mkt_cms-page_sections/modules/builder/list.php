<?php


use Marktic\Cms\PageSections\Models\PageSection;
use Marktic\Cms\Utility\CmsModels;

/** @var PageSection[] $sections */
$sections = $this->pageSections;
?>

<?php if (count($sections) < 1): ?>
    <?= $this->Messages()->info(CmsModels::pageSections()->getMessage('dnx')); ?>
<?php else: ?>
    <div class="page-sections-list d-grid gap-3" >
        <?php foreach ($sections as $section): ?>
            <?= $this->load(
                '/mkt_cms-page_sections/modules/builder/item',
                ['section' => $section]
            ); ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
