<?php
/** @var \Marktic\Cms\Sites\Models\Site $item */
$item = $item ?? null;
?>
<tr>
    <td>
        <a class="event-link" href="<?= $item->getURL(); ?>" title="">
            <?= $item->getName(); ?>
        </a>
    </td>
    <td>
        <?= $item->getRoleObject()->getLabel(); ?>
    </td>
</tr>