<? define ('SECURITY', true) ?>
<? require_once '../../../engine/bootLoader.php' ?>
<?php if (@ /* Notice */ $_SESSION['access'] != 'teacher' ) exit ('Access is denied!') ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>

<body>

<? require_once pathTemplate . 'sectionHeader.php' ?>

<main id = "main">

<div id = "sidebar-left">
    <? require_once pathTemplate . 'widgetOffice.php' ?>
</div>
            
<div id = "content">
    <div class = "content">
        <div class = "title">Добавление категории документов</div>
        <div class = "content-description">
        	<form method = "POST">
        		<input type = "text" name = "title" placeholder = "| Введите название категории" required>
        		<select name = "category" size = "10" required>
        			<option value = "0">Самостоятельная категория</option>
        			<? foreach ($categoryArticles AS $section): ?>
        				<option value = "<?= $section[0] ?>"><?= $section[1] ?></option>
        			<? endforeach; ?>
        		</select>
        		<input type = "submit" name = "aCategoryCreator" class = "styler" value = "Опубликовать">
			</form>
        </div>
    </div>
</div>
           
<div id = "sidebar-right">
    <? require_once pathTemplate . 'widgetSections.php' ?>
</div>
            
</main>