<?php
    // fonction importe tous les poste par ordre de date
    function get_ocpdemandes()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE renvoyer='1' AND valid IS NULL ORDER BY date DESC");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>
