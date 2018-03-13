<?php

/*
========================================================
 Файл: controllerReturn.php
--------------------------------------------------------
 Назначение: Return data from DataBase
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Получение сформированного SQL - запроса с использованием ORDER BY */
$sortingSQL = dataSorting($sorting);

/* Получение сгенерированных значений - mathCaptcha */
$mathArray = mathCaptcha($mathArray);

/* Получение сгенерированных значений - questionsCaptcha */
$questionsCaptcha = questionsCaptcha($questionsArray);
$question = $questionsCaptcha['question'];

/* Получение всех записей из таблицы NEWS */
$newsAll = dataAll($tableNews);

/* Получение всех записей из таблицы EVENTS */
$eventsAll = dataAll($tableEvents);

/* Получение всех записей из таблицы DOCUMENTS */
$documentsAll = dataAll($tableDocuments);

/* Получение всех записей из таблицы ARTICLES */
$articlesAll = dataAll($tableArticles);

/* Получение всех записей из таблицы COMMENTS */
$commentsAll = dataAll($tableComments);

/* Получение определенной записи из таблицы TEACHER */
$teacherRow = dataRow($tableTeacher);
$_SESSION['emailTeacher'] = $teacherRow[1];

/* Получение определенной записи из таблицы EVENTS */
$eventRow = dataRow($tableEvents, $ID);

/* Получение определенной записи из таблицы NEWS */
$newRow = dataRow($tableNews, $ID);

/* Получение определенной записи из таблицы DOCUMENTS */
$documentRow = dataRow($tableDocuments, $ID);

/* Получение определенной записи из таблицы ARTICLES */
$articleRow = dataRow($tableArticles, $ID);

/* Получение определенной записи из таблицы A_ARTICLES */
$aCategoryRow = dataRow($tableCategory, $ID);

/* Получение всех записей из таблицы EVENTS в ограниченном количестве */
$eventsLimit = dataLimit($tableEvents, $sortingSQL, $startAmount, $maxAmount);

/* Получение всех записей из таблицы ARTICLES в ограниченном количестве */
$articlesLimit = dataLimit($tableArticles, $sortingSQL, $startAmount, $maxAmount);

/* Получение всех записей из таблицы DOCUMENTS в ограниченном количестве */
$documentsLimit = dataLimit($tableDocuments, $sortingSQL, $startAmount, $maxAmount);

/* Получение определенных записей из таблиц ARTICLES / EVENTS в ограниченном количестве */ 
if ($setting) {
    $eventsLimit = dataByDate($tableEvents, $setting, $sortingSQL, $startAmount, $maxAmount);
    $articlesLimit = dataByCategory($tableArticles, $setting, $sortingSQL, $startAmount, $maxAmount);
}

/* Получение информации о датах проведения внеклассных мероприятий */
$dateEvents = dateEvents($tableEvents);

/* Получение информации о заголовках разделов и наименовании категорий из таблицы A_CATEGORY */
$categoryArticles = categorySection($tableCategory);

/* Получение всех записей из таблицы COMMENTS в ограниченном количестве */
$commentsLimit = dataLimit($tableComments, $sortingSQL, $startAmount, $maxAmount);