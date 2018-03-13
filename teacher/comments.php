<? define ('SECURITY', TRUE) ?>
<? require_once '../engine/bootLoader.php' ?>
<? if (@ /* Notice */ $_SESSION['access'] != 'teacher' ) exit ('Access is denied!') ?>

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
            <div class = "title">Управление комментариями</div>
            <div class = "content-description">
            	<? require_once pathTemplate . 'sectionAlert.php' ?> 
				<table>
					<tr>
						<th>№</th>
						<th>Тип автора</th>
						<th>Текст комментария</th>
						<th></th>
					</tr>
					<? foreach ($commentsAll AS $item): ?>
					<tr>
						<td><?= $serialNumber++ ?></td>
						<td><?= $item[5] ?></td>
						<td><?= dataReplace($item[6]) ?></td>
	                    <td> <a onclick = "return confirmDelete()" href = "?action=comment&id=<?= $item[0] ?>">Удалить</a> </td>
					</tr>
					<? endforeach ?>
				</table>
            </div>
        </div>
    </div>

</main>

<? require_once pathTemplate . 'sectionFooter.php' ?>
                                                        
</body>
    
</html>