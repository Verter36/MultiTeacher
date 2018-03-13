<? define ('SECURITY', true) ?>
<? require_once '../../engine/bootLoader.php' ?>
<?php if (@ /* Notice */ $_SESSION['access'] != 'teacher' ) exit ('Access is denied!') ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>

<body>

<? require_once pathTemplate . 'sectionHeader.php' ?>

<main id = "main">

<div id = "sidebar-left">
    <? require_once pathTemplate . 'widgetOffice.php' ?>
</div>
            
<div id = "content">
    <div class = "content">
        <div class = "title">Добавление свидетельства</div>
        <div class = "content-description"> 
            <form method = "POST">
                <input type = "text" name = "title" placeholder = "| Введите название свидетельства" required>
                <input type = "text" name = "date" placeholder = "| Введите год получения свидетельства, например 2017" required pattern = "[0-9]{4}">
                <textarea name = "description" placeholder = "| Введите краткое описание свидетельства" required></textarea>
                <input type = "text" name = "link" placeholder = "| Введите адрес свидетельства в CloudDrive, например http://yandex.ru" required>
                <input type = "submit" name = "documentCreator" class = "styler" value = "Опубликовать">
            </form>
        </div>
    </div>
</div>
           
<div id = "sidebar-right">
    <? require_once pathTemplate . 'widgetSections.php' ?>
</div>
            
</main>
        
<? require_once pathTemplate . 'sectionFooter.php' ?>
        
</body>

</html>