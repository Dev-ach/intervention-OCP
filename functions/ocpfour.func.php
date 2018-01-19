<?php
    function get_four(){
        global $db;
        $req=$db->query("
                        SELECT demande.id,
                               demande.materiel,
                               materiels.nom,
                               materiels.type,
                               materiels.fingarantie,
                               fournisseurs.name,
                               fournisseurs.telephone,
                               fournisseurs.email
                        FROM demande
                        JOIN materiels
                        ON demande.materiel=materiels.idMateriel
                        JOIN fournisseurs
                        ON materiels.fournisseur=fournisseurs.idFourniseur
                        WHERE demande.renvoyer='1' AND demande.valid IS NULL AND demande.id='{$_GET['id']}'
                        ");
        $result=$req->fetchObject();
        return $result;
    }
    
    function envoyer_four($name,$email,$marc,$type,$ocpdescription){
        
        $subject= "Au fournisseur ".$name." de OCP";
        $message='
                  <html lang="en" style="font-family: sans-serif;">
                    <head>
                        <meta charset="UTF-8">
                    </head>
                    <body>
                        <p>Type de materiel '.$type.'</p>
                        <p>marc de materiel '.$marc.'</p>
                        <p>'.$ocpdescription.'</p>
                    </body>
                   </html>
                 ';
        $header="MIME-Version: 1.0\r\n";
        $header.="Content-type: text/html; charset=UTF-8\r\n";
        $header.='Form: no-reply@achraf.com' . "\r\n". "Reply-To:Gomast@achraf.com"."\r\n"."X-Mailer:PHP/".phpversion();
        mail($email,$subject,$message,$header);
    }