<?php
 function is_modo($email,$valid)
    {
        global $db;
        $e=[
            'email'=>$email,
            'valid'=> $valid
           ];
        $sql="SELECT * FROM user WHERE email= :email AND usmateriel= :valid";
        $req=$db->prepare($sql);
        $req->execute($e);
        $exist=$req->rowCount($sql);
        return $exist;
    }

    function up_pass($pass)
    {
        global $db;
        $p=[
            'password'=> sha1($pass),
            'session' =>$_SESSION['admin']            
            ];
        $sql="UPDATE user SET pass = :password WHERE email=:session";
        $req=$db->prepare($sql);
        $req->execute($p);
    }
    
    function ex_pass()
    {
        global $db;
        $sql="SELECT * FROM user WHERE email='{$_SESSION['admin']}' AND pass IS NULL ";
        $req= $db->prepare($sql);
        $req->execute();
        $ex=$req->rowCount($sql);
        return $ex;
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
