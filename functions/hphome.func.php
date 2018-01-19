<?php
    // fonction importe tous les poste par ordre de date
    function get_demandes()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE valid IS NULL AND hpdescription IS NULL ORDER BY date DESC");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>
