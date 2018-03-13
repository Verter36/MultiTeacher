<? define ('SECURITY', true) ?>
<? require_once 'engine/bootLoader.php' ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>

<body>
        
<? require_once pathTemplate . 'sectionHeader.php' ?>
          
<main id = "main">

<div id = "sidebar-left">
    <? require_once pathTemplate . 'widgetSorting.php' ?>
    
    <? if ($categoryArticles): ?>
    <div class = "widget">
		<? foreach ($categoryArticles AS $section): ?>
        	<div class = "title"><?= $section[1] ?></div>
            
            <? if ( isset($section['categoryTitle']) ): ?>
				<? foreach ($section['categoryTitle'] AS $title): ?>
					<a href = "?setting=<?= $title[0] ?>"><?= $title[1] ?></a>
				<? endforeach; ?>
        	<? endif; ?>
		<? endforeach; ?>
    </div>
    <? endif; ?>
</div>
            
<div id = "content">
    <? if (!$articlesLimit): ?>
        <? require_once pathTemplate . 'sectionContent.php' ?>
    <? endif; ?>
   
    <? foreach ($articlesLimit AS $item): ?>
    <div class = "content">
        <div class = "title"><?= $item[1] ?></div>
        <div class = "content-panels">
            <ul>
                <li>Дата публикации документа: <?= $item[2] ?></li>
        		<? foreach ($categoryArticles AS $section): ?>
					<? foreach ($section['categoryTitle'] AS $title): ?>
					        
						<? if ($item[4] == $title[0]): ?>
							<li>Категория документа: <?= $title[1] ?></li>
						<? endif; ?>
					<? endforeach; ?>
				<? endforeach; ?>
            </ul>
        </div>
        <div class = "content-description"><?= $item[3] ?></div>
        <div class = "content-button">
            <a href = "<?= $item[5] ?>" title = "Открыть в новой вкладке" target = "_blank">
                Открыть документ в CloudDrive</a>
        </div>
    </div>
    <? endforeach; ?>
    
    <? if ($pagesArticles > 1): ?>
    <div id = "pagination">
        <? for ($page = 1; $page <= $pagesArticles; $page++): ?>   
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