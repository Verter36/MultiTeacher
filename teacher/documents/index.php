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
    <? require_once pathTemplate . 'widgetSections.php' ?>
</div>
            
<div id = "content-table">
    <div class = "content">
        <div class = "title">Управление свидетельствами</div>
        <div class = "content-description">
        <? require_once pathTemplate . 'sectionAlert.php' ?> 
            <table>
                <tr>
                    <th>№</th>
                    <th>Название свидетельства</th>
                    <th>Год получения</th>
                    <th></th>
                </tr>
                <? foreach ($documentsAll AS $item): ?>
                <tr>
                    <td><?= $serialNumber++ ?></td>
                    <td><?= dataReplace($item[1]) ?></td>
                    <td><?= $item[2] ?></td>
                    <td> <a onclick = "return confirmDelete()" href = "?action=document&id=<?= $item[0] ?>">Удалить</a> | <a href = "editor.php?id=<?= $item[0] ?>">Редактировать</a> </td>
                </tr>
                <? endforeach; ?>
            </table>
            <input type = "submit" class = "styler" value = "Новая публикация" onclick = "redirectToPage('creator.php')">
        </div>
    </div>
</div>
            
</main>
        
<? require_once pathTemplate . 'sectionFooter.php' ?>
        
</body>

</html>