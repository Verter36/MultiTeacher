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
        <div class = "title">Редактирование категории документов</div>
        <div class = "content-description">
        	<form method = "POST">
        		<input type = "text" name = "title" placeholder = "| Введите название категории" value = "<?= $aCategoryRow[1] ?>" required>
        		<select name = "category" size = "10" required
                <? if ($aCategoryRow[2] == 0): ?> disabled <? endif; ?>>
        			<option value = "0">Самостоятельная категория</option>
        			<? foreach ($categoryArticles AS $section): ?>
        				<option value = "<?= $section[0] ?>" 
        				    <? if ($aCategoryRow[2] == $section[0]): ?> selected <? endif; ?>>
        				    <?= $section[1] ?>
        				</option>
        			<? endforeach; ?>
        		</select>
        		<input type = "submit" name = "aCategoryEditor" class = "styler" value = "Сохранить изменения">
			</form>
        </div>
    </div>
</div>
           
<div id = "sidebar-right">
    <? require_once pathTemplate . 'widgetSections.php' ?>
</div>
            
</main>