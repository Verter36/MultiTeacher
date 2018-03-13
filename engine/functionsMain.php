<?php

/*
========================================================
 Файл: functionsMain.php
--------------------------------------------------------
 Назначение: Function library - Main
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Открытие нового соединения с сервером MySQL */
function PDOConnect() {
	global $PDOConnect;
	
    $dsn = 'mysql:dbname='.DB_NAME.'; host='.DB_HOSTING;
   
    try {
        $PDOConnect = new PDO($dsn, DB_LOGIN, DB_PASSWORD);
        $PDOConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
       exit( 'Please check if the connection to the database is correct: ' . $e->getCode() );
    }
}

/* Извелечение строк из результирующего набора */
function dataToArray($query) {
	$resultArray = array();
	
	while ( $result = $query->fetch(PDO::FETCH_NUM) ) {
		$resultArray[] = $result;
	}
	
	return $resultArray;
}

/* Формирование SQL - запроса с использованием ORDER BY */
function dataSorting($sorting) {
	switch ($sorting) {
		case '1':
            $sortingSQL = 'ORDER BY date';
            break;
        case '2':
            $sortingSQL = 'ORDER BY date DESC';
            break;
        case '3':
            $sortingSQL = 'ORDER BY title';
            break;
        case '4':
            $sortingSQL = 'ORDER BY title DESC';
            break;
        default:
            $sortingSQL = 'ORDER BY date DESC';
            break;
    }
    
    return $sortingSQL;
}

/* Сокращение данных выводимых на страницу */
function dataReplace($data) {
    if (mb_strlen($data) >= 40) {
        $data = mb_substr($data, 0, 40, 'UTF-8') . '...';
		return $data;
    } else {
        return $data;
    }
}

/* Фильтрация полученных данных */
function dataProtect($data, $mode = FALSE) {
   $data = htmlspecialchars($data);
   $data = stripcslashes($data);
   $data = strip_tags($data);
   $data = trim($data);
   
   if ($mode == TRUE) {
       $data = mb_convert_case($data, MB_CASE_TITLE);
   }
   
   return $data;
}

/* Проверка полей на заполняемость */
function fieldsIsNull($fieldsArray) {
	$nullField = 0;
	
	for ($value = 0; $value < COUNT($fieldsArray); $value++) {
		if ( empty($fieldsArray[$value]) ) {
			$nullField++;
		}
	}
	
	if ($nullField == 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/* Получение информации о результате выполнения SQL - запроса */
function affectedRows($query) {
    if ($query->rowCount() == 1) {
        $_SESSION['messageSuccess'] = messageToPage('MESSAGE_SUCCESS');
    } else {
        $_SESSION['messageDanger'] = messageToPage('MESSAGE_UNKNOWN');
    } 
}

/* Получение системных сообщений */
function messageToPage($title) {
    $messageArray = parse_ini_file('message.ini');
    return $messageArray[$title];
}

/* Отключение повторной передачи данных на сервер */
function reloadLocation() {
    $reloadLocation = $_SERVER['HTTP_REFERER'];
    header("Location: $reloadLocation");
    exit;
}

/* Выход из системы */
function logOut() {
    unset ($_SESSION['access']);
    header('Location: /');
    exit;
}

/* Проверка хэшированного пароля */
function passwordVerify($query, $password) {
    $result = $query->fetch(PDO::FETCH_NUM);
    
    if ( password_verify($password, $result[0]) ) {
        return TRUE;
    } else {
        return FALSE;
    }
}

/* Генерирование значений - mathCaptcha */
function mathCaptcha($mathArray) {    
    $_SESSION['mathCaptcha'] = $mathArray['valueOne'] + $mathArray['valueTwo'];
    return $mathArray;
}

/* Генерирование значений - questionsCaptcha */
function questionsCaptcha($questionsArray) {
	$questionsCaptcha = array( 'question' => $question = mt_rand(0, COUNT($questionsArray) - 1) );
	$_SESSION['questionsCaptcha'] = $questionsArray[$question][1];
	return $questionsCaptcha;
}