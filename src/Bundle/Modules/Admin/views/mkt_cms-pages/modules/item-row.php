<?php

use Marktic\Cms\Sites\Models\Site;

/** @var Site $item */
$item = $item ?? null;
$metadata = $item->getMetadata();
?>
<tr>
    <td>
        <a class="event-link" href="<?= $item->getURL(); ?>" title="">
            <?= $item->getName(); ?>
        </a>
    </td>
    <td>
        <span class="badge text-bg-primary">
            <?= $metadata->getRole(); ?>
        </span>
    </td>
</tr>