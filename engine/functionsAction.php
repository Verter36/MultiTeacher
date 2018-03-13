<?php

/*
========================================================
 Файл: functionsAction.php
--------------------------------------------------------
 Назначение: Function library - Actions
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Авторизация в панели администратора */
function authTeacher($tableName, $email, $password, $captcha) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT password FROM $tableName WHERE email = ? LIMIT 1";
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($email) );
	
	$fieldsArray = array($email, $password, $captcha);
	
	if ( !fieldsIsNull($fieldsArray) ) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
	} elseif ($captcha != $_SESSION['mathCaptcha']) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_CAPTCHA_MATH');
	} elseif ($query->rowCount() == 1) {
		if ( !passwordVerify($query, $password) ) {
			$_SESSION['messageDanger'] = messageToPage('MESSAGE_PASSWORD_AUTH');
		} else {
            $_SESSION['access'] = 'teacher';
            header("Location: profile.php");
			exit;
		}
	} else {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_EMAIL_AUTH');
	}
}

/* Изменение пароля администратора */
function recoveryTeacher($tableName, $password, $passwordRepeat, $passwordCurrent) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT password FROM $tableName LIMIT 1";
	$query = $PDOConnect->query($SQL);
	
	$fieldsArray = array($password, $passwordRepeat, $passwordCurrent);
	
	if ( !fieldsIsNull($fieldsArray) ) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
	} elseif ( !passwordVerify($query, $passwordCurrent) ) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_PASSWORD_CURRENT');
	} elseif ($password != $passwordRepeat) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_PASSWORD_REPEAT');
	} else {
        $password = password_hash($password, PASSWORD_BCRYPT);
		
		$SQL = "UPDATE $tableName SET password = ?";
		$query = $PDOConnect->prepare($SQL);
		$query->execute( array($password) );
		
		affectedRows($query);
    }
} 

/* Загрузка основной фотографии администратора */
function uploadAvatar() {
    if ($_FILES['uploadAvatar']['error'] != 0) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_UNKNOWN');
    } elseif ($_FILES['uploadAvatar']['type'] != 'image/jpeg') {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_AVATAR_TYPE');
    } else {
        move_uploaded_file($_FILES['uploadAvatar']['tmp_name'], pathUpload . 'avatar.jpg');
        $_SESSION['messageSuccess'] = messageToPage('MESSAGE_SUCCESS');
    }
}

/* Добавление комментария о работе преподавателя */
function actionComment($tableComments, $fieldsArray, $prepareArray, $captcha) {
	global $PDOConnect;
	PDOConnect();
	
	if ( !fieldsIsNull($fieldsArray) ) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
	} elseif ($captcha != $_SESSION['questionsCaptcha']) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_CAPTCHA_QUESTIONS');
	} else {
		dataInsert($tableName, $fieldsArray, $prepareArray);
	}
}

/* Отправка сообщения на E-mail - адрес преподавателя */
function actionMail($fieldsArray, $captcha) {
	if ( !fieldsIsNull($fieldsArray) ) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
	} elseif ($captcha != $_SESSION['questionsCaptcha']) {
		$_SESSION['messageDanger'] = messageToPage('MESSAGE_CAPTCHA_QUESTIONS');
	} else {
		$headers = "Content-type: text/plain; charset=utf-8\r\n";
		$email = $_SESSION['emailTeacher'];
		
        $message = 'Фамилия: ' . $fieldsArray[0] . "\r\n";
        $message .= 'Имя: ' . $fieldsArray[1] . "\r\n";
        $message .= 'Отчество: ' . $fieldsArray[2] . "\r\n";
        $message .= 'Адрес электронной почты: ' . $fieldsArray[3] . "\r\n";
        $message .= 'Сообщение: ' . $fieldsArray[5];
		
        mail($email, $fieldsArray[4], $message, $headers);
        $_SESSION['messageSuccess'] = messageToPage('MESSAGE_SUCCESS');
	}
}

/* Отправка сообщений об использовании продукта */
function actionStatistics($title, $tableName, $emailSchool) {
	$headers = "Content-type: text/plain; charset=utf-8\r\n";
	
	$message = 'Адрес сайта преподавателя: ' . $_SERVER['SERVER_NAME'] . pathServer . "\r\n";
	$message .= 'Раздел: ' . $tableName . "\r\n";
	$message .= 'Название: ' . $title . "\r\n";
	$message .= 'Дата публикации: ' . date("d/m/Y") . "\r\n";
	mail($emailSchool, 'admin@mt.ru', $message, $headers);
}

/* Добавление новой записи в таблицу */
function dataInsert($tableName, $fieldsArray, $prepareArray) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "INSERT INTO $tableName VALUES ";
    
    if ( !fieldsIsNull($fieldsArray) ) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
    } else {
        $SQL .= "('', " . implode($prepareArray, ', ') . ')';

        $query = $PDOConnect->prepare($SQL);
        $query->execute($fieldsArray);
        
        affectedRows($query);
    }
}

/* Изменение определенной записи в таблице */
function dataUpdate($tableName, $fieldsArray, $columnsArray, $ID) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "UPDATE $tableName SET ";
    
    if ( !fieldsIsNull($fieldsArray) ) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
    } else {
        $SQL .= implode($columnsArray, ' = ?, ') . ' = ? WHERE id = ' . $ID;

        $query = $PDOConnect->prepare($SQL);
        $query->execute($fieldsArray);
        
        affectedRows($query);
    }
}

/* Удаление определенной записи в таблице */
function dataDelete($tableName, $ID) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "DELETE FROM $tableName WHERE id = ?";
    $query = $PDOConnect->prepare($SQL);
    $query->execute( array($ID) );
    
    affectedRows($query);
}

/* Добавление новой категории */
function categoryInsert($tableName, $title, $category) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "SELECT id FROM $tableName WHERE title = ? AND idParent = ? LIMIT 1";
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($title, $category) );
    
    if ( !fieldsIsNull($title) ) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
    } elseif ($query->rowCount() == 1) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_CATEGORY_TITLE');
    } else {
        $SQL = "INSERT INTO $tableName VALUES ('', ?, ?)";
        $query = $PDOConnect->prepare($SQL);
        $query->execute( array($title, $category) );
        
        affectedRows($query);
    }
}

/* Изменение определенной категории */
function categoryUpdate($tableName, $title, $category, $ID) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "SELECT id FROM $tableName WHERE title = ? AND idParent = ? LIMIT 1";
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($title, $category) );
    
    if ( !fieldsIsNull($title) ) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_FIELDS_NULL');
    } elseif ($query->rowCount() == 1) {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_CATEGORY_TITLE');
        reloadLocation();
    } else {
        $SQL = "UPDATE $tableName SET title = ?, idParent = ? WHERE id = '$ID' ";
        $query = $PDOConnect->prepare($SQL);
        $query->execute( array($title, $category) );
        
        affectedRows($query);
    }
}

/* Удаление определенной категории */
function categoryDelete($tableName, $ID) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "SELECT COUNT(id) FROM $tableName WHERE idParent = ? LIMIT 1";
    $query = $PDOConnect->prepare($SQL);
    $query->execute( array($ID) );
    $result = $query->fetch(PDO::FETCH_NUM);
    
    if ($result[0] == 0) {
        $SQL = "DELETE FROM $tableName WHERE id = ?";
        $query = $PDOConnect->prepare($SQL);
        $query->execute( array($ID) );
        
        affectedRows($query);
    } else {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_CATEGORY_EXIST');
        reloadLocation();
    }
}