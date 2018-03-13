<? define ('SECURITY', TRUE) ?>
<? require_once 'engine/bootLoader.php' ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>
    
<body>

<? require_once pathTemplate . 'sectionHeader.php' ?>
        
<main id = "main">
   
    <div id = "sidebar-left">
		<? require_once pathTemplate . 'widgetSorting.php' ?>
    </div>
    
    <div id = "content">
    
        <? if (!$commentsLimit): ?>
        	<? require_once pathTemplate . 'sectionContent.php' ?>
        <? endif ?>
    
		<? foreach ($commentsLimit AS $item): ?>
        <div class = "content">
            <div class = "title"><?= $item[1] . ' ' . $item[2] . ' ' . $item[3] ?></div>
            <div class = "content-panels">
                <ul>
                    <li>Дата публикации комментария: <?= $item[4] ?></li>
                    <li>Тип автора: <?= $item[5] ?></li>
                </ul>
            </div>
            <div class = "content-description"><?= $item[6] ?></div>
        </div>
        <? endforeach ?>
        
		<? if ($pagesComments > 1): ?>
		<div id = "pagination">
			<? for ($page = 1; $page <= $pagesComments; $page++): ?>   
				<input type = "submit" class = "styler" value = "<?= $page ?>" onclick = "redirectToPage('<?= $URIPage ?>page=<?= $page ?>')">
			<? endfor; ?>
		</div>
		<? endif; ?>
    </div>
    
    <div id = "sidebar-right">
		<? require_once pathTemplate . 'widgetYandex.php' ?>
		<? require_once pathTemplate . 'widgetMenu.php' ?>
        <? require_once pathTemplate . 'widgetNews.php' ?>
    </div>

</main>

<? require_once pathTemplate . 'sectionFooter.php' ?>
                                                        
</body>
    
</html>