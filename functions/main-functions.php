<?php
    session_start();
    //la connection a la base de donnees
    $dbhost='localhost';
    $dbname='intervention';
    $dbuser='root';
    $dbpass='';
    try
    {
        $db=new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch(PDOException $e)
    {
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
    
    function admin()
    {
        if(isset($_SESSION['admin']))
        {
            global $db;
            $a=[
                'email'=>$_SESSION['admin'],
                'rol' =>'admin'
               ];
            $sql="SELECT * FROM user WHERE email=:email AND rol=:rol";
            $req=$db->prepare($sql);
            $req->execute($a);
            $ex=$req->rowCount($sql);
            return $ex;
        }
        else
        {
            return 0;
        }
    }
    
    function hp()
    {
        if(isset($_SESSION['admin']))
        {
            global $db;
            $a=[
                'email'=>$_SESSION['admin'],
                'rol' =>'hp'
               ];
            $sql="SELECT * FROM user WHERE email=:email AND rol=:rol";
            $req=$db->prepare($sql);
            $req->execute($a);
            $ex=$req->rowCount($sql);
            return $ex;
        }
        else
        {
            return 0;
        }
    }
    function user()
    {
        if(isset($_SESSION['admin']))
        {
            global $db;
            $a=[
                'email'=>$_SESSION['admin'],
                'rol' =>'utilisateur'
               ];
            $sql="SELECT * FROM user WHERE email=:email AND rol=:rol";
            $req=$db->prepare($sql);
            $req->execute($a);
            $ex=$req->rowCount($sql);
            return $ex;
        }
        else
        {
            return 0;
        }
    }
    
    function ocp()
    {
        if(isset($_SESSION['admin']))
        {
            global $db;
            $a=[
                'email'=>$_SESSION['admin'],
                'rol' =>'ocp'
               ];
            $sql="SELECT * FROM user WHERE email=:email AND rol=:rol";
            $req=$db->prepare($sql);
            $req->execute($a);
            $ex=$req->rowCount($sql);
            return $ex;
        }
        else
        {
            return 0;
        }
    }
?>
