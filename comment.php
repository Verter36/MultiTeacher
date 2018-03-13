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
            <div class = "title">Комментарий о работе преподавателя</div>
            <div class = "content-description">
            <? require_once pathTemplate . 'sectionAlert.php' ?>
				<form method = "POST">
					<input type = "text" name = "surname" placeholder = "| Введите фамилию" autocomplete = "off" maxlength = "25">
					<input type = "text" name = "name" placeholder = "| Введите имя" required autocomplete = "off" maxlength = "25">
					<input type = "text" name = "patronymic" placeholder = "| Введите отчество" autocomplete = "off" maxlength = "25">
            		<textarea name = "message" placeholder = "| Введите текст сообщения" required autocomplete = "off"></textarea>
					<select name = "type" size = "4" required>
						<option value = "Посетитель">Посетитель</option>
						<option value = "Преподаватель">Преподаватель</option>
						<option value = "Родитель">Родитель</option>
						<option value = "Обучающийся">Обучающийся</option>
					</select>
	                <input type = "text" name = "captcha" placeholder = "| Введите ответ на вопрос: <?= $questionsArray[$question][0] ?>" required autocomplete = "off">
            		<button type = "submit" name = "actionComment" class = "styler">Отправить комментарий</button>
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