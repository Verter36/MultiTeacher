<?php

/*
========================================================
 Файл: controllerGET.php
--------------------------------------------------------
 Назначение: Getting GET and POST parameters
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Получение GET - параметров системы */
$ID      = dataProtect( filter_input(INPUT_GET, 'id') );
$page    = dataProtect( filter_input(INPUT_GET, 'page') );
$action  = dataProtect( filter_input(INPUT_GET, 'action') );
$sorting = dataProtect( filter_input(INPUT_GET, 'sorting') );
$setting = dataProtect( filter_input(INPUT_GET, 'setting') ); 

/* Получение POST - параметров системы */
$type    = dataProtect( filter_input(INPUT_POST, 'type') );
$email   = dataProtect( filter_input(INPUT_POST, 'email') );
$captcha = dataProtect( filter_input(INPUT_POST, 'captcha'), TRUE );
$message = dataProtect( filter_input(INPUT_POST, 'message') );

$password        = dataProtect( filter_input(INPUT_POST, 'password') );
$passwordRepeat  = dataProtect( filter_input(INPUT_POST, 'passwordRepeat') );
$passwordCurrent = dataProtect( filter_input(INPUT_POST, 'passwordCurrent') );

$job             = dataProtect( filter_input(INPUT_POST, 'job') );
$name            = dataProtect( filter_input(INPUT_POST, 'name'), TRUE );
$surname         = dataProtect( filter_input(INPUT_POST, 'surname'), TRUE );
$jobYear         = dataProtect( filter_input(INPUT_POST, 'jobYear') );
$subject         = dataProtect( filter_input(INPUT_POST, 'subject') );
$manager         = dataProtect( filter_input(INPUT_POST, 'manager') );
$patronymic      = dataProtect( filter_input(INPUT_POST, 'patronymic'), TRUE );
$liteInformation = dataProtect( filter_input(INPUT_POST, 'liteInformation') );

$date        = dataProtect( filter_input(INPUT_POST, 'date') );
$link        = dataProtect( filter_input(INPUT_POST, 'link') );
$title       = dataProtect( filter_input(INPUT_POST, 'title') );
$category    = dataProtect( filter_input(INPUT_POST, 'category') );
$description = dataProtect( filter_input(INPUT_POST, 'description') );