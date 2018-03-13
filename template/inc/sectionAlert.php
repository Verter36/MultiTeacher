<? defined ('SECURITY') or exit ('Access is denied!') ?>

<? if ( isset($_SESSION['messageSuccess']) ): ?>
    <div id = "alert-success"><?= $_SESSION['messageSuccess'] ?></div>
<? unset ($_SESSION['messageSuccess']) ?>    
<? endif; ?>

<? if ( isset($_SESSION['messageDanger']) ): ?>
    <div id = "alert-danger"><?= $_SESSION['messageDanger'] ?></div>
<? unset ($_SESSION['messageDanger']) ?>
<? endif; ?>