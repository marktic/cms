<?php

use Marktic\Cms\Pages\Models\Page;
use Marktic\Cms\Utility\CmsModels;

$repository = CmsModels::pages();
/** @var Page $item */
$item = $item ?? $this->page;
?>
<table class="table table-striped">
    <tbody>
    <tr>
        <td>
            <?= translator()->trans('name'); ?>
        </td>
        <td>
            <?= $item->getName(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= translator()->trans('slug'); ?>
        </td>
        <td>
            <?= $item->getSlug(); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= CmsModels::sites()->getLabel('title.singular'); ?>
        </td>
        <td>
            SITES LIST
        </td>
    </tr>
    <tr>
        <td>
            <?= translator()->trans('date'); ?>
        </td>
        <td>
            <div class="row">
                <div class="col">
                    <span class="d-block text-muted">UPDATED</span>
                    <strong><?= $item->modified; ?></strong>
                </div>
                <div class="col">
                    <span class="d-block text-muted">CREATED</span>
                    <strong><?= $item->created; ?></strong>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>