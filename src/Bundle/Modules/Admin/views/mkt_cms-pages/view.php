<?php

?>

<?= $this->Flash()->render($this->controller); ?>
<div class="d-grid gap-l">
    <div class="row">
        <div class="col-md-6">
            <?= $this->load('/mkt_cms-pages/modules/panels/item-details'); ?>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $this->load('/mkt_cms-pages/modules/panels/item-builder'); ?>
        </div>
    </div>
</div>
