<?php
    // fonction importe tous les poste par ordre de date
    function get_ocpinter()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE renvoyer='1' AND valid IS NULL AND id='{$_GET['id']}'");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>
