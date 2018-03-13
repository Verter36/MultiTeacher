<? define ('SECURITY', true) ?>
<? require_once 'engine/bootLoader.php' ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>

<body>
        
<? require_once pathTemplate . 'sectionHeader.php' ?>
          
<main id = "main">

<div id = "sidebar-left">
    <div class = "widget">
        <div id = "profile-avatar">
            <img src = "upload/avatar.jpg" alt = "Изображение недоступно">
        </div>
        <div id = "profile-panels">
            <ul>
                <li>ФИО преподавателя: <?= $teacherRow[2] . ' ' . $teacherRow[3] . ' ' . $teacherRow[4] ?></li>
                <li>E-mail - адрес преподавателя: <?= $teacherRow[1] ?></li>
                <li>Место работы: <?= $teacherRow[6] ?></li>
                <li>Год начала работы в ОУ: <?= $teacherRow[7] ?></li>
                <li>Преподаваемые дисциплины: <?= $teacherRow[8] ?></li>
                <li>Классное руководство: <?= $teacherRow[9] ?></li>
            </ul>
        </div>
    </div>
</div>
            
<div id = "content">
    <div id = "lite-information"> <p><?= $teacherRow[10] ?></p> </div>
    
    <? if (!$documentsLimit): ?>
        <? require_once pathTemplate . 'sectionContent.php' ?>
    <? endif; ?>
    
    <? foreach ($documentsLimit AS $item): ?>
    <div class = "content">
        <div class = "title"><?= $item[1] ?></div>
        <div class = "content-panels">
            <ul>
                <li>Год получения свидетельства: <?= $item[2] ?></li>
            </ul>
        </div>
        <div class = "content-description"><?= $item[3] ?></div>
        <div class = "content-button">
            <a href = "<?= $item[4] ?>" title = "Открыть в новой вкладке" target = "_blank">
                Открыть свидетельство в CloudDrive</a>
        </div>
    </div>
    <? endforeach; ?>
    
    <? if ($pagesDocuments > 1): ?>
    <div id = "pagination">
        <? for ($page = 1; $page <= $pagesDocuments; $page++): ?>   
            <input type = "submit" class = "styler" value = "<?= $page ?>" onclick = "redirectToPage('?page=<?= $page ?>')">
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