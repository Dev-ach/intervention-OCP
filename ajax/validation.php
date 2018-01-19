<?php
    require"../functions/main-functions.php";
    $db->exec("UPDATE demande SET valid='hp',hpedit='{$_SESSION['admin']}',hpdate=NOW() WHERE id='{$_POST['id']}'");

?>
