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
                         }elseif($test['rol']=='admin'){
                            header("location:index.php?page=admin");
                         }
}

?>
<div class="row">
    <div class="col l4 m6 s12 offset-l4 offset-m3 ">
        <div class="card-panel">
            <div class="row">
                <div class="col s8 offset-s2">
                   <img src="img/ocp.png" alt="Modérateur" width="100%"> 
                </div>
            </div>
            <h4 class="center-align">Connexion</h4>
            <?php
                if(isset($_POST['post']))
                {
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
                    else if(is_modo($email,$valid)==0)
                    {
                        $errors['user']="Ce modérateur n'existe pas";
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
                        $_SESSION['admin']=$email;
                        if(ex_pass()==0)
                            {
                                if(hp()==1)
                                {
                                    header("location:index.php?page=hphome");
                                }
                                elseif(ocp()==1){
                                   header("location:index.php?page=ocphome");
                                }
                            }
                        up_pass($password_1);
                        if(hp()==1)
                        {
                            header("location:index.php?page=hphome");
                        }
                        elseif(ocp()==1){
                           header("location:index.php?page=ocphome");
                        }
                    }
                }
            ?>
            <form method="post">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input type="email" id="email" name="email"/>
                    <label for="email">Adresse email</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">restore</i>
                    <input type="text" id="valid" name="valid"/>
                    <label for="valid">Code unique</label>
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
                    <a href="index.php?page=login">Déjà modérateur</a>
                </center>
            </form>
        </div>
    </div>
    
</div>