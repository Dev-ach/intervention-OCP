<?php
    // fonction importe tous les poste par ordre de date
    function get_inter()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE renvoyer IS NULL AND valid IS NULL AND id='{$_GET['id']}'");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>