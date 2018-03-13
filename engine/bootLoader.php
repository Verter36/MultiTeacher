<?php

/*
========================================================
 Файл: bootLoader.php
--------------------------------------------------------
 Назначение: Connecting system components
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

require_once 'config.php';
require_once pathEngine . 'functionsMain.php';
require_once pathEngine . 'controllerGET.php';
require_once pathEngine . 'functionsData.php';
require_once pathEngine . 'functionsAction.php';
require_once pathEngine . 'modulePagination.php';
require_once pathEngine . 'controllerAction.php';
require_once pathEngine . 'controllerReturn.php';