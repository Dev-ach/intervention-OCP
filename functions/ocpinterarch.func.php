<?php
    // fonction importe tous les poste par ordre de date
    function get_ocpinterarch()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE valid='ocp' AND id='{$_GET['id']}'");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>
