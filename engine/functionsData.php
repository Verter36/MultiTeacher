<?php

/*
========================================================
 Файл: functionsData.php
--------------------------------------------------------
 Назначение: Function library - DataBase
========================================================
*/

/* SECURITY компонента от прямого вызова */
defined ('SECURITY') or exit ('Access is denied!');

/* Получение всех записей из таблицы */
function dataAll($tableName) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT * FROM $tableName ORDER BY date DESC";
	$query = $PDOConnect->query($SQL);
	$result = dataToArray($query);
	
	return $result;
}

/* Получение определенной записи из таблицы */
function dataRow($tableName, $ID = 1) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT * FROM $tableName WHERE id = ? LIMIT 1";
	
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($ID) );
	$result = $query->fetch(PDO::FETCH_NUM);
	
	return $result;
}

/* Получение всех записей из таблицы в ограниченном количестве */
function dataLimit($tableName, $sortingSQL, $startAmount, $maxAmount) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "SELECT * FROM $tableName $sortingSQL LIMIT $startAmount, $maxAmount";
    $query = $PDOConnect->query($SQL);
    $result = dataToArray($query);
    
    return $result;
}

/* Получение определенных записей из таблицы в ограниченном количестве - Category */
function dataByCategory($tableName, $setting, $sortingSQL, $startAmount, $maxAmount) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT * FROM $tableName WHERE category = ? $sortingSQL 
			LIMIT $startAmount, $maxAmount";
	
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($setting) );
	$result = dataToArray($query);
	
	return $result;
}

/* Получение определенных записей из таблицы в ограниченном количестве - Date */
function dataByDate($tableName, $setting, $sortingSQL, $startAmount, $maxAmount) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT * FROM $tableName WHERE date BETWEEN	? AND ? $sortingSQL
			LIMIT $startAmount, $maxAmount";
	
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($setting . '-01', $setting . '-31') );
	$result = dataToArray($query);
	
	return $result;
}

/* Получение информации о датах проведения внеклассных мероприятий */
function dateEvents($tableName) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "SELECT DISTINCT LEFT(date, 7) AS dateEvents FROM $tableName ORDER BY date DESC";
    $query = $PDOConnect->query($SQL);
    $result = dataToArray($query);
    
    return $result;
}

/* Получение информации о заголовках разделов и наименовании категорий */
function categorySection($tableName) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT * FROM $tableName WHERE idParent = 0";
	$query = $PDOConnect->query($SQL);
	
	$resultArray = array();
	
	while ( $result = $query->fetch(PDO::FETCH_NUM) ) {
        $categoryTitle = categoryTitle($tableName, $result[0]);
        
        if ($categoryTitle) {
            $result['categoryTitle'] = $categoryTitle;
        }
		
		$resultArray[] = $result;
	}
	
	return $resultArray;
}

/* Получение информации о наименовани категорий */
function categoryTitle($tableName, $IDParent) {
    global $PDOConnect;
    PDOConnect();
    
    $SQL = "SELECT * FROM $tableName WHERE idParent = '$IDParent' ";
    $query = $PDOConnect->query($SQL);
    $result = dataToArray($query);
    
    return $result;
}

/* Получение информации о количестве всех записей в таблице */
function dataCount($tableName) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT COUNT(id) FROM $tableName LIMIT 1";
    $query = $PDOConnect->query($SQL);
    $result = $query->fetch(PDO::FETCH_NUM);
    
    return $result[0];
}

/* Получение информации о количестве определенных записей в таблице - Category */
function dataCountByCategory($tableName, $setting) {
	global $PDOConnect;
	PDOConnect();
	
    $SQL = "SELECT COUNT(id) FROM $tableName WHERE category = ? LIMIT 1";
	
    $query = $PDOConnect->prepare($SQL);
    $query->execute( array($setting) );
    $result = $query->fetch(PDO::FETCH_NUM);
    
    return $result[0];    
}

/* Получение информации о количестве определенных записей в таблице - Date */
function dataCountByDate($tableName, $setting) {
	global $PDOConnect;
	PDOConnect();
	
	$SQL = "SELECT COUNT(id) FROM $tableName WHERE date BETWEEN	? AND ? ";
	
	$query = $PDOConnect->prepare($SQL);
	$query->execute( array($setting . '-01', $setting . '-31') );
	$result = $query->fetch(PDO::FETCH_NUM);
	
    return $result[0];    
}