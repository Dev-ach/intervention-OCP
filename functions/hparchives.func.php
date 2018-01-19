<?php
    // fonction importe tous les poste par ordre de date
    function get_archives()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE valid='hp' ORDER BY date DESC");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>
