<?php

/*
========================================================
 Файл: controllerAction.php
--------------------------------------------------------
 Назначение: Processes incoming requests
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Комментарий */
$URISorting = '?';
$URIPage = '?';
$pathServer = pathServer;

if ( filter_input(INPUT_SERVER, 'QUERY_STRING') ) {
    foreach ($_GET AS $key => $value) {
        if ( ($key != 'sorting') and ($key != 'page') ) $URISorting .= "$key=$value&";
        if ($key != 'page') $URIPage .= "$key=$value&";
    }
}

/* Обработка GET - параметра ACTION */
switch ($action) {
    case 'exit':
        logOut();
        break;
    case 'event':
        dataDelete($tableEvents, $ID);
        reloadLocation();
        break;
    case 'new':
        dataDelete($tableNews, $ID);
        reloadLocation();
        break;
    case 'document':
        dataDelete($tableDocuments, $ID);
        reloadLocation();
        break;
    case 'article':
        dataDelete($tableArticles, $ID);
        reloadLocation();
        break;
    case 'aCategory':
        categoryDelete($tableCategory, $ID);
        reloadLocation();
        break;
    case 'comment':
        dataDelete($tableComments, $ID);
        reloadLocation();
        break;
}

/* Обработка POST - параметра teacherAuth */
if ( isset($_POST['teacherAuth']) ) {
    authTeacher($tableTeacher, $email, $password, $captcha);
    reloadLocation();
}

/* Обработка POST - параметра teacherAvatar */
if ( isset($_POST['teacherAvatar']) ) {
    uploadAvatar();
    reloadLocation();
}

/* Обработка POST - параметра teacherRecovery */
if ( isset($_POST['teacherRecovery']) ) {
    recoveryTeacher($tableTeacher, $password, $passwordRepeat, $passwordCurrent);
    reloadLocation();
}

/* Обработка POST - параметра actionComment */
if ( isset($_POST['actionComment']) ) {
	$fieldsArray = array($surname, $name, $patronymic, $message, $type);
	$prepareArray = array('?', '?', '?', 'NOW()', '?', '?');
	
	actionComment($tableComments, $fieldsArray, $prepareArray, $captcha);
    reloadLocation();
}

/* Обработка POST - параметра actionMail */
if ( isset($_POST['actionMail']) ) {
	$fieldsArray = array($surname, $name, $patronymic, $email, $subject, $message);
	
	actionMail($fieldsArray, $captcha);
    reloadLocation();
}

/* Обработка POST - параметра teacherProfile */
if ( isset($_POST['teacherProfile']) ) {
    $fieldsArray = array($email, $surname, $name, $patronymic, $job, $jobYear, $subject, $manager, $liteInformation);
    $columnsArray = array('email', 'surname', 'name', 'patronymic', 'job', 'jobYear', 'subject', 'manager', 'liteInformation');
    
    dataUpdate($tableTeacher, $fieldsArray, $columnsArray, '1');
    reloadLocation();
}

/* Обработка POST - параметра eventCreator */
if ( isset($_POST['eventCreator']) ) {
    $fieldsArray = array($title, $date, $description, $link);
    $prepareArray = array('?', '?', '?', '?');
    
    dataInsert($tableEvents, $fieldsArray, $prepareArray);
	actionStatistics($title, 'Новостная лента', $emailSchool);
    header("Location: $pathServer/teacher/feed");
    exit;
}

/* Обработка POST - параметра eventEditor */
if ( isset($_POST['eventEditor']) ) {
    $fieldsArray = array($title, $date, $description, $link);
    $columnsArray = array('title', 'date', 'description', 'link');
    
    dataUpdate($tableEvents, $fieldsArray, $columnsArray, $ID);
    header("Location: $pathServer/teacher/feed/");
    exit;
}

/* Обработка POST - параметра newCreator */
if ( isset($_POST['newCreator']) ) {
    $fieldsArray = array($description);
    $prepareArray = array('NOW()', '?');
    
    dataInsert($tableNews, $fieldsArray, $prepareArray);
	actionStatistics($title, 'Информационная лента', $emailSchool);
    header("Location: $pathServer/teacher/news/");
    exit;
}

/* Обработка POST - параметра newEditor */
if ( isset($_POST['newEditor']) ) {
    $fieldsArray = array($description);
    $columnsArray = array('description');
    
    dataUpdate($tableNews, $fieldsArray, $columnsArray, $ID);
    header("Location: $pathServer/teacher/news/");
    exit;
}

/* Обработка POST - параметра documentCreator */
if ( isset($_POST['documentCreator']) ) {
    $fieldsArray = array($title, $date, $description, $link);
    $prepareArray = array('?', '?', '?', '?');
    
    dataInsert($tableDocuments, $fieldsArray, $prepareArray);
	actionStatistics($title, 'Достижения преподавателя', $emailSchool);
    header("Location: $pathServer/teacher/documents/");
    exit;
}

/* Обработка POST - параметра documentEditor */
if ( isset($_POST['documentEditor']) ) {
    $fieldsArray = array($title, $date, $description, $link);
    $columnsArray = array('title', 'date', 'description', 'link');

    dataUpdate($tableDocuments, $fieldsArray, $columnsArray, $ID);
    header("Location: $pathServer/teacher/documents/");
    exit;
}

/* Обработка POST - параметра articleCreator */
if ( isset($_POST['articleCreator']) ) {
    $fieldsArray = array($title, $description, $category, $link);
    $prepareArray = array('?', 'NOW()', '?', '?', '?');
    
    dataInsert($tableArticles, $fieldsArray, $prepareArray);
	actionStatistics($title, 'Документы преподавателя', $emailSchool);
    header("Location: $pathServer/teacher/articles/");
    exit;
}

/* Обработка POST - параметра articleEditor */
if ( isset($_POST['articleEditor']) ) {
    $fieldsArray = array($title, $description, $category, $link);
    $columnsArray = array('title', 'description', 'category', 'link');
    
    dataUpdate($tableArticles, $fieldsArray, $columnsArray, $ID);
    header("Location: $pathServer/teacher/articles/");
    exit;
}

/* Обработка POST - параметра aCategoryCreator */
if ( isset($_POST['aCategoryCreator']) ) {
    categoryInsert($tableCategory, $title, $category);
    header("Location: $pathServer/teacher/articles/category");
    exit;
}

/* Обработка POST - параметра aCategoryEditor */
if ( isset($_POST['aCategoryEditor']) ) {
    categoryUpdate($tableCategory, $title, $category, $ID);
    header("Location: $pathServer/teacher/articles/category");
    exit;
}