<?php

use Marktic\Cms\Utility\CmsModels;

?>
<thead>
<tr>
    <th><?= translator()->trans('name'); ?></th>
    <th><?= CmsModels::sites()->getLabel('role'); ?></th>
</tr>
</thead>