<? define ('SECURITY', TRUE) ?>
<? require_once 'engine/bootLoader.php' ?>

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
            <div class = "title">Обращение к преподавателю</div>
            <div class = "content-description">
            <? require_once pathTemplate . 'sectionAlert.php' ?>
            	<form method = "POST">
            		<input type = "text" name = "surname" placeholder = "| Введите фамилию" autocomplete = "off">
            		<input type = "text" name = "name" placeholder = "| Введите имя" required autocomplete = "off">
            		<input type = "text" name = "patronymic" placeholder = "| Введите отчество" autocomplete = "off">
            		<input type = "email" name = "email" placeholder = "| Введите адрес электронной почты" required autocomplete = "off">
            		<input type = "text" name = "subject" placeholder = "| Введите тему сообщения" required autocomplete = "off">
            		<textarea name = "message" placeholder = "| Введите текст сообщения" required autocomplete = "off"></textarea>
	                <input type = "text" name = "captcha" placeholder = "| Введите ответ на вопрос: <?= $questionsArray[$question][0] ?>" required autocomplete = "off">
            		<button type = "submit" name = "actionMail" class = "styler">Отправить сообщение</button>
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