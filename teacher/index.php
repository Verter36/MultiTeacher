<? define ('SECURITY', true) ?>
<? require_once '../engine/bootLoader.php' ?>
<?php if (@ /* Notice */ $_SESSION['access'] == 'teacher' ) header('Location: profile.php') ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>

<body>
        
<? require_once pathTemplate . 'sectionHeader.php' ?>
          
<main id = "main">

<div id = "sidebar-left">
    <? require_once pathTemplate . 'widgetMenu.php' ?>
</div>
            
<div id = "content">
    <div class = "content">
        <div class = "title">Вход в панель администратора</div>
        <div class = "content-description">
        <? require_once pathTemplate . 'sectionAlert.php' ?>
            <form method = "POST">
                <input type = "email" name = "email" placeholder = "| Введите адрес электронной почты" required autocomplete = "off">
                <input type = "password" name = "password" placeholder = "| Введите пароль" required autocomplete = "off">
                <input type = "text" name = "captcha" placeholder = "| Введите решение примера: <?= $mathArray['valueOne'] . ' + ' . $mathArray['valueTwo'] ?>" required autocomplete = "off">
                <input type = "submit" name = "teacherAuth" class = "styler" value = "Авторизоваться в системе">
            </form>
        </div>
    </div>
</div>
            
<div id = "sidebar-right">
    <? require_once pathTemplate . 'widgetYandex.php' ?>
    <? require_once pathTemplate . 'widgetNews.php' ?>
</div>
            
</main>
        
<? require_once pathTemplate . 'sectionFooter.php' ?>
        
</body>

</html>