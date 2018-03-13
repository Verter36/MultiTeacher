<? defined ('SECURITY') or exit ('Access is denied!') ?>

<div id = "header-menu-touch">
    <a href = "#">Открыть / Закрыть навигацию</a>
</div>
        
<header id = "header">
    <nav id = "header-menu">
        <ul>
            <li> <a href = "<?= pathServer ?>">О преподавателе</a> </li>
            <li> <a href = "<?= pathServer ?>/articles.php">Документы преподавателя</a> </li>
            <li> <a href = "<?= pathServer ?>/feed.php">Новостная лента</a> </li>
			<li> <a href = "<?= pathServer ?>/comments.php">Комментарии о работе</a> </li>
        </ul>
    </nav>
</header>