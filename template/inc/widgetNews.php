<? defined ('SECURITY') or exit ('Access is denied!') ?>

<div class = "widget">
    <div class = "title">Информационная лента</div>
    
    <? foreach ($newsAll AS $item): ?>
    <div class = "news-slide">
        <div class = "news-date">Дата публикации: <?= $item[1] ?></div>
        <div class = "widget-description"><?= $item[2] ?></div>
     </div>
    <? endforeach; ?>
                    
    <div id = "news-button">
        <input type = "submit" class = "styler" id = "prev" onclick = "swypeSlides(1)" value = "Предыдущая">
        <input type = "submit" class = "styler" id = "next" onclick = "swypeSlides(-1)" value = "Следующая">
    </div>
</div>