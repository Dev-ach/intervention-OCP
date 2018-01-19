<?php
    // fonction importe tous les poste par ordre de date
    function get_demande()
    {
        global $db;
        $req=$db->query("SELECT * FROM demande WHERE valid IS NULL AND hpdescription IS NULL AND id='{$_GET['id']}'");
        $results=array();
        while($rows=$req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }

function post($dest,$contact,$categorie,$urgence,$service,$titre,$hpdescription)
    {
        global $db;
        $p=array(
            'dest'=>$dest,
            'contact'=>$contact,
            'categorie'=>$categorie,
            'urgence'=>$urgence,
            'service'=>$service,
            'titre'=>$titre,
            'description'=>$hpdescription,
            'hpedit'=>$_SESSION['admin'],
           );
        $sql="UPDATE demande SET dest =:dest,
                                 contact=:contact,
                                 categorie=:categorie,
                                 urg=:urgence,
                                 serv=:service,
                                 titre=:titre,
                                 hpdescription=:description,
                                 hpdate=NOW(),
                                 hpedit=:hpedit,
                                 renvoyer='1'
                                 WHERE id='{$_GET['id']}' ";
        $req= $db->prepare($sql);
        $req->execute($p);
    }

?>