<?php
    // fonction importe tous les poste par ordre de date
    function get_interarch()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE valid='hp' AND id='{$_GET['id']}'");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>
