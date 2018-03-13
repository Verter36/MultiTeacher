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
    <? require_once pathTemplate . 'widgetSections.php' ?>
</div>
            
<div id = "content-table">
    <div class = "content">
        <div class = "title">Управление категориями документов</div>
        <div class = "content-description">
        <? require_once pathTemplate . 'sectionAlert.php' ?> 
            <table>
                <tr>
                    <th>№</th>
                    <th>Название категории</th>
                    <th></th>
                </tr>
                <? foreach ($categoryArticles AS $section): ?>
					<tr class = "content-section">
						<td><?= $serialNumber++ ?></td>
						<td><?= dataReplace($section[1]) ?></td>
						<td> <a onclick = "return confirmDelete()" href = "?action=aCategory&id=<?= $section[0] ?>">Удалить</a> | <a href = "editor.php?id=<?= $section[0] ?>">Редактировать</a> </td>
					</tr>
					
					<? if ( isset($section['categoryTitle']) ): ?>
						<? foreach ($section['categoryTitle'] AS $title): ?>
							<tr>
								<td><?= $serialNumber++ ?></td>
								<td><?= $title[1] ?></td>
								<td> <a onclick = "confirmDelete()" href = "?action=aCategory&id=<?= $title[0] ?>">Удалить</a> | <a href = "editor.php?id=<?= $title[0] ?>">Редактировать</a> </td>
							</tr>
              			<? endforeach; ?>
                    <? endif; ?>
                <? endforeach; ?>
            </table>
            <input type = "submit" class = "styler" value = "Новая категория" onclick = "redirectToPage('creator.php')">
        </div>
    </div>
</div>
            
</main>
        
<? require_once pathTemplate . 'sectionFooter.php' ?>
        
</body>

</html>