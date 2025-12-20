<?php

use ByTIC\AdminBase\Widgets\Cards\Card;
use ByTIC\Icons\Icons;

/** @var \Marktic\Cms\Pages\Models\Page $item */
$item = $item ?? $this->item;

$pagesRepository = \Marktic\Cms\Utility\CmsModels::pages();
$card = Card::make()
    ->withView($this)
    ->withTitle($pagesRepository->getLabel('title.singular'))
    ->withIcon(Icons::list_ul())
//    ->addHeaderTool(
//        ButtonAction::make()
//            ->setUrl(
//                $item->compileURL('view',)
//            )
//            ->addHtmlClass('btn-xs')
//            ->setLabel(translator()->trans('view'))
//    )
//    ->themeSuccess()
    ->wrapBody(false)
//    ->setHtmlAttribute('id', 'donations-panel')
    ->withViewContent('/mkt_cms-pages/modules/item/details', ['item' => $this->item]);
?>
<?= $card ?>