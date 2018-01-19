<?php
    function post($dest,$contact,$categorie,$urgence,$service,$titre,$description,$materiel)
    {
        global $db;
        $p=array(
            'dest'=>$dest,
            'contact'=>$contact,
            'categorie'=>$categorie,
            'urgence'=>$urgence,
            'service'=>$service,
            'titre'=>$titre,
            'description'=>$description,
            'materiel'=>$materiel,
            'edit'=>$_SESSION['admin']
           );
        $sql="INSERT INTO demande(dest,contact,categorie,urg,serv,titre,description,materiel,date,edit)
              VALUES (:dest,:contact,:categorie,:urgence,:service,:titre,:description,:materiel,NOW(),:edit)";
        $req= $db->prepare($sql);
        $req->execute($p);
    }
    
    function file_post($tmp_name,$extension)
    {
        global $db;
        $id=$db->lastInsertId();
        $i=[
            'id' =>$id,
            'fichier'=>$id.$extension
           ];
        $sql="UPDATE demande SET file = :fichier WHERE id = :id";
        $req=$db->prepare($sql);
        $req->execute($i);
        move_uploaded_file($tmp_name,"file/".$id.$extension);
    }
    function mat_user($email){
        global $db;
        $e=['email'=>$email];
        $sql="SELECT usmateriel FROM user WHERE email= :email";
        $req=$db->prepare($sql);
        $req->execute($e);
        $result=$req->fetch();
        return $result;
    }
?>

