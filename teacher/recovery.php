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
        <div class = "title">Управление безопасностью аккаунта</div>
        <div class = "content-description">
        <? require_once pathTemplate . 'sectionAlert.php' ?>   
            <form method = "POST">
                <input type = "password" name = "passwordCurrent" placeholder = "| Введите текущий пароль" required autocomplete = "off">
                <input type = "password" name = "password" placeholder = "| Введите новый пароль" required autocomplete = "off">
                <input type = "password" name = "passwordRepeat" placeholder = "| Введите новый пароль повторно" required autocomplete = "off">
                <input type = "submit" name = "teacherRecovery" class = "styler" value = "Сохранить изменения">
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