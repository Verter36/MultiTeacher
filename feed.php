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
    
    <div class = "widget">
        <div class = "title">Календарь мероприятий</div>

        <? foreach ($dateEvents AS $item): ?>
            <a href = "?setting=<?= $item[0] ?>"><?= $item[0] ?></a>
        <? endforeach; ?>
    </div>
</div>
            
<div id = "content">
    <? if (!$eventsLimit): ?>
        <? require_once pathTemplate . 'sectionContent.php' ?>
    <? endif; ?>
   
    <? foreach ($eventsLimit AS $item): ?>
    <div class = "content">
        <div class = "title"><?= $item[1] ?></div>
        <div class = "content-panels">
            <ul>
                <li>Дата проведения мероприятия: <?= $item[2] ?></li>
            </ul>
        </div>
        <div class = "content-description"><?= $item[3] ?></div>
        <div class = "content-button">
            <a href = "<?= $item[4] ?>" title = "Открыть в новой вкладке" target = "_blank">
                Открыть отчет о мероприятии в CloudDrive</a>
        </div>
    </div>
    <? endforeach; ?>
    
    <? if ($pagesEvents > 1): ?>
    <div id = "pagination">
        <? for ($page = 1; $page <= $pagesEvents; $page++): ?>   
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