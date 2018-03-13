<? define ('SECURITY', true) ?>
<? require_once 'engine/bootLoader.php' ?>

<!DOCTYPE html>

<html>
    
<? require_once pathTemplate . 'sectionHead.php' ?>

<body>
        
<? require_once pathTemplate . 'sectionHeader.php' ?>
          
<main id = "main">

<div id = "sidebar-left">
    <? require_once pathTemplate . 'widgetMenu.php' ?>
</div>
            
<div id = "content">
    <div class = "content">
        <div class = "title">#404 - Страница не найдена</div>
        <div class = "content-description">
			Невозможно обработать текущий URL - адрес. <br>
            Пожалуйста, убедитесь, что Вы указали корректный адрес страницы. <br>
   		</div>
    </div>
</div>
            
<div id = "sidebar-right">
    <? require_once pathTemplate . 'widgetNews.php' ?>
</div>
            
</main>
        
<? require_once pathTemplate . 'sectionFooter.php' ?>
        
</body>

</html>