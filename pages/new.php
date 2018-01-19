<?php
if(!empty($_SESSION['admin'])){
$test=role_ad($_SESSION['admin']);
        
                         if($test['rol']=='utilisateur'){
                           header("location:index.php?page=home");
                         }
                         elseif($test['rol']=='hp'){
                            header("location:index.php?page=hphome");
                         }elseif($test['rol']=='ocp'){
                            header("location:index.php?page=ocphome");
                         }
}

?>
<div class="row">
<div class="col l6 m6 s12 offset-l3 offset-m3 ">
        <div class="card-panel">
            <div class="row">
                <div class="col s8 offset-s2">
                    <center><img src="img/1.jpg" alt="Administrateur" width="50%"/></center>
                </div>
            </div>
            <h4 class="center-align">Connexion</h4>
            <?php
                if(isset($_POST['post']))
                {
                    $nom=htmlspecialchars(trim($_POST['nom']));
                    $email=htmlspecialchars(trim($_POST['email']));
                    $valid=htmlspecialchars(trim($_POST['valid']));
                    $password_1=htmlspecialchars(trim($_POST['password_1']));
                    $password_2=htmlspecialchars(trim($_POST['password_2']));
                    
                    $errors=[];
                    
                    if(empty($email) || empty($valid) || empty($password_1) || empty($password_2))
                       {
                        $errors['empty']="Tous les champs n'ont pas été remplis";
                       }
                    elseif($password_1 != $password_2)
                    {
                        $errors['different']="Les mots de passe sont différent";
                    }
                    else if(is_user($valid)==0)
                    {
                        $errors['user']="Ce materiel n'existe pas";
                    }
                    elseif(is_email($email)!=0){
                        $errors['email']="Email existe dèja";
                    }
                    if(!empty($errors))
                    {
                    ?>    
                    <div class="card red">
                        <div class="card-content white-text">
                         <?php
                            foreach($errors as $error)
                            {
                                echo $error."<br/>";
                            }
                         ?>   
                        </div>
                    </div>    
                    <?php    
                    }
                    else
                    {
                        creat_compte($nom,$email,$valid,$password_1);
                        $_SESSION['admin']=$email;
                        up_materiel($valid);
                        header("location:index.php?page=home");
                    }
                }
            ?>
            <form method="post">
                <div class="input-field col s12">
                    <input type="text" id="nom" name="nom"/>
                    <label for="email">nom</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" id="email" name="email"/>
                    <label for="email">Adresse email</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">restore</i>
                    <input type="text" id="valid" name="valid"/>
                    <label for="valid">Code materiel</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" id="password_1" name="password_1"/>
                    <label for="password_1">Mot de passe</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" id="password_2" name="password_2"/>
                    <label for="password_2">Répéter le mot de passe</label>
                </div>
                <center>
                    <button type="submit" name="post" class="btn waves-effect waves-light green">
                        <i class="material-icons left">perm_identity</i>
                        Se connecter
                    </button>
                    <br/><br/>
                    <a href="index.php?page=login">Déjà utilisateur</a>
                </center>
            </form>
        </div>
        </div>
</div>