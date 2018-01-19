<?php
    if(hp()==1)
    {
        header("location:index.php?page=hphome");
    }
    elseif(ocp()==1){
       header("location:index.php?page=ocphome"); 
    }elseif(user()==1){
        header("location:index.php?page=home"); 
    }
?>
<h2>Paramétres</h2>
    <div class="row">
        <div class="col s6 m6 s12">
            <h4>Modérateurs</h4>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Validé</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $modos= get_modos();
                        foreach($modos as $modo)
                        {
                    ?>
                        <tr>
                            <td><?=$modo->nom ?></td>
                            <td><?=$modo->email?></td>
                            <td><?=$modo->rol?></td>
                            <td><i class="material-icons"><?php echo (!empty($modo->pass))?"verified_user":"av_timer"?></i></td>
                        </tr>
                    
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col s6 m6 s12">
            <h4>Ajouter un Modérateur</h4>
            <?php
                if(isset($_POST["post"]))
                {
                    $name=htmlspecialchars(trim($_POST['name']));
                    $email=htmlspecialchars(trim($_POST['email']));
                    $email_rep=htmlspecialchars(trim($_POST['email_rep']));
                    $role=htmlspecialchars(trim($_POST['role']));
                    $valid=validation(30);
                    
                    $errors=[];
                    
                    if(empty($name) || empty($email) || empty($email_rep))
                    {
                        $errors['empty']="Veuillez remplir tous les champs";
                    }
                    
                    if($email != $email_rep)
                    {
                        $errors['dif']="Les Adresses email ne correpondent pas";
                    }
                    
                    if(email_ver($email))
                    {
                        $errors['ver']="L'adresse email est déja assignée ";
                    }
                    
                    if(!empty($errors))
                    {
                        ?>
                            <div class="card red">
                                <div class="card-content white-text">
                                    <?php
                                        foreach($errors as $error){
                                            echo $error."<br/>";
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        add_modo($name,$email,$valid,$role);
                    ?>
                    <div class="card green">
                        <div class="card-content white-text">
                            <p>Un <?=$role?> est ajouter avec succès</p>
                            <p>Un message est envoyé sur <?=$email?></p>
                        </div>
                    </div>
                    <?php
                    }
                }
            ?>
            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="name" id="name"/>
                        <label for="name">Nom</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="email" name="email" id="email"/>
                        <label for="email">Adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="email" name="email_rep" id="email_rep"/>
                        <label for="email_rep">Répéter l'adresse email</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="role" id="role">
                            <option value="hp">HP</option>
                            <option value="ocp">OCP</option>
                        </select>
                        <label for="role">Rôle</label>
                    </div>
                    <div class="col s12">
                        <button type="submit" name="post" class="btn">AJOUTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>