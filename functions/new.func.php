<?php
    function role_ad($email){
        global $db;
        $e=['email'=>$email];
        $sql="SELECT rol FROM user WHERE email= :email";
        $req=$db->prepare($sql);
        $req->execute($e);
        $result=$req->fetch();
        return $result;
    }
    
    function is_email($email){
        global $db;
        $e=[
            'email'=> $email
           ];
        $sql="SELECT * FROM user WHERE email= :email ";
        $req=$db->prepare($sql);
        $req->execute($e);
        $exist=$req->rowCount($sql);
        return $exist;
    }
    
    function is_user($valid)
    {
        global $db;
        $e=[
            'valid'=> $valid
           ];
        $sql="SELECT * FROM materiels WHERE idMateriel= :valid AND user IS NULL";
        $req=$db->prepare($sql);
        $req->execute($e);
        $exist=$req->rowCount($sql);
        return $exist;
    }
    function creat_compte($nom,$email,$valid,$password_1)
    {
        global $db;
        $p=[
            'nom'=>$nom,
            'password'=> sha1($password_1),
            'session' =>$email,
            'materiel'=>$valid
            ];
        $sql="INSERT INTO user(nom,email,pass,rol,usmateriel)
              VALUES (:nom,:session,:password,'utilisateur',:materiel)";
        $req=$db->prepare($sql);
        $req->execute($p);
       
    }
    function up_materiel($valid)
    {
        global $db;
        $id=$db->lastInsertId();
        $i=[
            'id' =>$id,
            'materiel'=>$valid
           ];
        $sql1="UPDATE materiels SET user = :id WHERE idMateriel =:materiel";
        $req1=$db->prepare($sql1);
        $req1->execute($i);
    }
?>
