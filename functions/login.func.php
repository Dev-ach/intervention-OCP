<?php
    function is_admin($email,$password)
    {
        global $db;
        $e=[
            'email'=>$email,
            'password'=> sha1($password)
           ];
        $sql="SELECT * FROM user WHERE email= :email AND pass= :password";
        $req=$db->prepare($sql);
        $req->execute($e);
        $exist=$req->rowCount($sql);
        return $exist;
    }
    
    function role_ad($email){
        global $db;
        $e=['email'=>$email];
        $sql="SELECT rol FROM user WHERE email= :email";
        $req=$db->prepare($sql);
        $req->execute($e);
        $result=$req->fetch();
        return $result;
    }
?>