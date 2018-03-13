<?php

/*
========================================================
 Файл: modulePagination.php
--------------------------------------------------------
 Назначение: Module pagination navigation
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Получение информации о количестве записей в таблице ARTICLES */
$articlesCount = dataCount($tableArticles);

/* Получение информации о количестве записей в таблице DOCUMENTS */
$documentsCount = dataCount($tableDocuments);

/* Получение информации о количестве записей в таблице EVENTS */
$eventsCount = dataCount($tableEvents);

/* Получение информации о количестве записей в таблице COMMENTS */
$commentsCount = dataCount($tableComments);

/* Получение информации о количестве определенных записей в таблицах ARTICLES / EVENTS */
if ($setting) {
    $eventsCount = dataCountByDate($tableEvents, $setting);
    $articlesCount = dataCountByCategory($tableArticles, $setting);
}

/* Получение информации о необходимом количестве страниц - ARTICLES */
$pagesArticles = ceil($articlesCount / $maxAmount);

/* Получение информации о необходимом количестве страниц - DOCUMENTS */
$pagesDocuments = ceil($documentsCount / $maxAmount);

/* Получение информации о необходимом количестве страниц - EVENTS */
$pagesEvents = ceil($eventsCount / $maxAmount);

/* Получение информации о необходимом количестве страниц - COMMENTS */
$pagesComments = ceil($commentsCount / $maxAmount);

/* Установка минимального количества страниц */
if ($page < 1) $page = 1;

/* Установка стартовой позиции для SQL - запроса с использованием LIMIT */
$startAmount = ($page - 1) * $maxAmount;