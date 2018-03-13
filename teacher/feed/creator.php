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
        <div class = "title">Добавление отчета о мероприятии</div>
        <div class = "content-description">  
            <form method = "POST">
                <input type = "text" name = "title" placeholder = "| Введите название внеклассного мероприятия" required>
                <input type = "text" name = "date" placeholder = "| Введите дату проведения мероприятия, например 2017-01-15" required maxlength = "25">
                <textarea name = "description" placeholder = "| Введите краткое описание отчета о внеклассном мероприятии" required></textarea>
                <input type = "text" name = "link" placeholder = "| Введите адрес отчета о мероприятии в CloudDrive, например http://yandex.ru" required>
                <input type = "submit" name = "eventCreator" class = "styler" value = "Опубликовать">
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