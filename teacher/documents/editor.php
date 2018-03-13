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
        <div class = "title">Редактирование публикации</div>
        <div class = "content-description"> 
            <form method = "POST">
                <input type = "text" name = "title" placeholder = "| Введите название свидетельства" value = "<?= $documentRow[1] ?>" required>
                <input type = "text" name = "date" placeholder = "| Введите год получения свидетельства, например 2017" value = "<?= $documentRow[2] ?>" required pattern = "[0-9]{4}">
                <textarea name = "description" placeholder = "| Введите краткое описание свидетельства" required><?= $documentRow[3] ?></textarea>
                <input type = "text" name = "link" placeholder = "| Введите адрес свидетельства в CloudDrive, например http://yandex.ru" value = "<?= $documentRow[4] ?>" required>
                <input type = "submit" name = "documentEditor" class = "styler" value = "Сохранить изменения">
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