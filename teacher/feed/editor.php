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
                <input type = "text" name = "title" placeholder = "| Введите название внеклассного мероприятия" value = "<?= $eventRow[1] ?>" required>
                <input type = "text" name = "date" placeholder = "| Введите дату проведения мероприятия, например 2017-01-15" value = "<?= $eventRow[2] ?>" required maxlength = "25">
                <textarea name = "description" placeholder = "| Введите краткое описание отчета о внеклассном мероприятии" required><?= $eventRow[3]?></textarea>
                <input type = "text" name = "link" placeholder = "| Введите адрес отчета о мероприятии в CloudDrive, например http://yandex.ru" value = "<?= $eventRow[4] ?>" required>
                <input type = "submit" name = "eventEditor" class = "styler" value = "Сохранить изменения">
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