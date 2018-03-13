<? define ('SECURITY', true) ?>
<? require_once '../../engine/bootLoader.php' ?>
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
        <div class = "title">Редактирование публикации</div>
        <div class = "content-description"> 
            <form method = "POST">
                <input type = "text" name = "title" placeholder = "| Введите название документа" value = "<?= $articleRow[1] ?>" required>
                <textarea name = "description" placeholder = "| Введите краткое описание документа" required><?= $articleRow[3] ?></textarea>
                <input type = "text" name = "link" placeholder = "| Введите адрес документа в CloudDrive, например http://yandex.ru" value = "<?= $articleRow[5] ?>" required>
        		<select name = "category" size = "10" required>
        			<? foreach ($categoryArticles AS $section): ?>
        			    <? foreach ($section['categoryTitle'] AS $title): ?>
					        <option value = "<?= $title[0] ?>" 
                                <? if ($articleRow[4] == $title[0]): ?> selected <? endif; ?>>
                                <?= $title[1] ?>
        				    </option>
				        <? endforeach; ?>
        			<? endforeach; ?>
        		</select>
                <input type = "submit" name = "articleEditor" class = "styler" value = "Сохранить изменения">
            </form>
        </div>
    </div>
</div>
           
<div id = "sidebar-right">
    <? require_once pathTemplate . 'widgetSections.php' ?>
</div>
            
</main>
        
<? require_once pathTemplate . 'sectionFooter.php' ?>
        
</body>

</html>