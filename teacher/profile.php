<? define ('SECURITY', true) ?>
<? require_once '../engine/bootLoader.php' ?>
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
        <div class = "title">Управление персональными данными</div>
        <div class = "content-description">
        <? require_once pathTemplate . 'sectionAlert.php' ?>    
            <form method = "POST">
                <input type = "email" name = "email" placeholder = "| Введите адрес электронной почты" value = "<?= $teacherRow[1] ?>" required maxlength = "50">
                <input type = "text" name = "surname" placeholder = "| Введите фамилию" required value = "<?= $teacherRow[2] ?>" maxlength = "25">
                <input type = "text" name = "name" placeholder = "| Введите имя" required value = "<?= $teacherRow[3] ?>" maxlength = "25">
                <input type = "text" name = "patronymic" placeholder = "| Введите отчество" required value = "<?= $teacherRow[4] ?>" maxlength = "25">
                <input type = "text" name = "job" placeholder = "| Введите место работы, например: МКОУ СОШ №1" value = "<?= $teacherRow[6] ?>" required>
                <input type = "text" name = "jobYear" placeholder = "| Введите год начала работы в ОУ, например: 2017" required value = "<?= $teacherRow[7] ?>" pattern = "[0-9]{4}">
                <textarea name = "subject" placeholder = "| Введите список преподаваемых дисциплин, например: Русский язык, Литература" required><?= $teacherRow[8] ?></textarea>
                <input type = "text" name = "manager" placeholder = "| Введите информацию о классном руководстве, например: Группа П-14" required value = "<?= $teacherRow[9] ?>" >
                <textarea name = "liteInformation" placeholder = "| Введите дополнительную информацию" required><?= $teacherRow[10] ?></textarea>
                <input type = "submit" name = "teacherProfile" class = "styler" value = "Сохранить изменения">
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