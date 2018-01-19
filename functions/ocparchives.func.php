<?php
    function get_archives()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE valid='ocp' ORDER BY date DESC");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>