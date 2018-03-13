<? defined ('SECURITY') or exit ('Access is denied!') ?>

<div class = "widget">
    <div class = "title">Личный кабинет</div>
    <a href = "<?= pathServer ?>/teacher/avatar.php">Основная фотография</a>
    <a href = "<?= pathServer ?>/teacher/profile.php">Персональные данные</a>
    <a href = "<?= pathServer ?>/teacher/recovery.php">Безопасность аккаунта</a>
    <a href = "<?= pathServer ?>?action=exit">Выйти из системы</a>
</div>