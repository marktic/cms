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
        <pre class="bg-light p-2 text-monospace"><?= json_encode($item->metadata->toArray()); ?></pre>
    </td>
</tr>