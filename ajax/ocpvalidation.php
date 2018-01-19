<?php
    require"../functions/main-functions.php";
    $db->exec("UPDATE demande SET valid='ocp',ocpedit='{$_SESSION['admin']}',ocpdate=NOW() WHERE id='{$_POST['id']}'");

?>
