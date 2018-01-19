<?php
    function email_ver($email)
    {
        global $db;
        $e=['email'=> $email ];
        $sql="SELECT * FROM user WHERE email = :email";
        $req = $db->prepare($sql);
        $req->execute($e);
        $result=$req->rowCount($sql);
        return $result;
        
    }
    
    function validation($long)
    {
        $shars="qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM1234567890";
        return substr(str_shuffle(str_repeat($shars,$long)),0,$long);
    }
    
    function add_modo($name,$email,$valid,$role)
    {
        global $db;
        $m=[
                'name'=> $name,
                'email'=> $email,
                'valid'=>$valid,
                'role'=>$role
           ];
        $sql ="INSERT INTO user (nom,email,usmateriel,rol) VALUES (:name,:email,:valid,:role)";
        $req= $db->prepare($sql);
        $req->execute($m);
        
        $subject= "Un ".$role." sur le site d'intervention ocp";
        $message='
                  <html lang="en" style="font-family: sans-serif;">
                    <head>
                        <meta charset="UTF-8">
                    </head>
                    <body>
                        Voici votre identifiant et le code unique à insérer sur <a href="http://localhost/intervention/index.php?page=newad">cette page</a>
                        <br/>Identifiant:'.$email.'
                        <br/>Mot de passe:'.$valid.'
                        <br/>Vous êtes: '.$role.'
                        <br/><br/>Aprés avoir inséré ces information, vous devrez choisir un mot de passe.
                    </body>
                   </html>
                 ';
        $header="MIME-Version: 1.0\r\n";
        $header.="Content-type: text/html; charset=UTF-8\r\n";
        $header.='Form: no-reply@achraf.com' . "\r\n". "Reply-To:Gomast@achraf.com"."\r\n"."X-Mailer:PHP/".phpversion();
        mail($email,$subject,$message,$header);
    }
    
    function get_modos()
    {
        global $db;
        $req=$db->query("SELECT * FROM user WHERE rol='hp' OR rol='ocp' ");
        $results=[];
        while($rows = $req->fetchObject())
        {
            $results[]=$rows;
        }
        return $results;
    }
?>




