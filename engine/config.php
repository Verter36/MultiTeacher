<?php

/*
========================================================
 Файл: config.php
--------------------------------------------------------
 Назначение: Configuring system parameters
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Start new or resume existing session */
session_start();

/* Настройка уровня ERRORS системы */
error_reporting(0);

/* Настройка директорий системы */
define ('pathEngine', 	$_SERVER['DOCUMENT_ROOT'] . '/engine/');
define ('pathUpload', 	$_SERVER['DOCUMENT_ROOT'] . '/upload/');
define ('pathTemplate', $_SERVER['DOCUMENT_ROOT'] . '/template/inc/');
define ('pathServer',   '/');

/* Настройка соединения с сервером MySQL */
const DB_NAME     = 'demo';
const DB_LOGIN    = 'teacher';
const DB_PREFIX   = 'MT_';
const DB_HOSTING  = 'localhost';
const DB_PASSWORD = 'Rewq4321';

/* Настройка E-mail - адреса ОУ */
$emailSchool = 'kulabuhov98@mail.ru';

/* Настройка максимального количества записей на страницу */
$maxAmount = 3;

/* Настройка максимального и минимального значения - mathCaptcha */
$mathArray = array(
	'valueOne' => mt_rand(1, 10),
    'valueTwo' => mt_rand(1, 10)
);

/* Настройка данных - questionCaptcha */
$questionsArray = array(  
	array(0 => 'Столица России?', 1 => 'Москва'), 
    array(0 => 'Столица Украины?', 1 => 'Киев'), 
    array(0 => 'Магазин лекарств?', 1 => 'Аптека'),
    array(0 => 'Последний месяц лета?', 1 => 'Август'),
    array(0 => 'Оптика на носу?', 1 => 'Очки'),    
    array(0 => 'Кислый, желтый фрукт?', 1 => 'Лимон'),  
    array(0 => 'Холодное время года?', 1 => 'Зима'), 
    array(0 => 'Документ, об окончании школы?', 1 => 'Аттестат'), 
    array(0 => 'Документ, об окончании ВУЗа?', 1 => 'Диплом'), 
    array(0 => 'Гора, дышащая огнев?', 1 => 'Вулкан'), 
    array(0 => 'Суша, окруженная водой?', 1 => 'Остров'),  
    array(0 => 'Первый месяц года?', 1 => 'Январь'), 
    array(0 => 'Последний месяц года?', 1 => 'Декабрь'), 
    array(0 => 'Третий день недели?', 1 => 'Среда'),                      
);

/* Настройка минимального значения порядкового номера */
$serialNumber = 1;

/* Настройка корректных названий таблиц в Базе Данных */
$tableNews      = DB_PREFIX . 'news';
$tableEvents    = DB_PREFIX . 'events';
$tableTeacher   = DB_PREFIX . 'teacher';
$tableArticles  = DB_PREFIX . 'articles';
$tableCategory  = DB_PREFIX . 'category';
$tableComments  = DB_PREFIX . 'comments';
$tableDocuments = DB_PREFIX . 'documents';