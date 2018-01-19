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
</br></br></br></br></br>
<div class="row">
    <div class="col l6 m6 s12 offset-l1 offset-m1">
               </br></br></br><div class="slider">
                <ul class="slides">
                  <li>
                    <img src="img/2.jpg"> <!-- random image -->
                    <div class="caption center-align">
                      </div>
                  </li>
                  <li>
                    <img src="img/3.jpg"> <!-- random image -->
                    <div class="caption center-align">
                      </div>
                  </li>
                  <li>
                    <img src="img/4.jpg"> <!-- random image -->
                    <div class="caption center-align">
                      </div>
                  </li>
                </ul>
            </div>
    </div>
    <div class="col l4 m4 s12 ">
        <div class="card-panel">
            <div class="row">
                <div class="col s8 offset-s2">
                    <center><img src="img/1.jpg" alt="Administrateur" width="50%"/></center>
                </div>
            </div>
            <h4 class="center-align">Connexion</h4>
            <?php
                if(isset($_POST['submit']))
                {
                    $email=htmlspecialchars(trim($_POST['email']));
                    $password=htmlspecialchars(trim($_POST['password']));
                    $errors=[];
                    if(empty($email) || empty($password))
                    {
                        $errors['empty']="tous les champs n'ont pas été remplis!";
                    }
                    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                    {
                        $errors['email']="L'adresse email n'est pas valide";
                    }
                    else if(is_admin($email,$password) == 0)
                    {
                        $errors['exist']="Cet administrateur n'existe pas ou le mot de passe est incorect";
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
                         $_SESSION['admin']= $email;
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
                         
                }
            ?>
            <form method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" id="email" name="email"/>
                        <label for="email">Adresse email</label>    
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" id="password" name="password"/>
                        <label for="password">Mot de passe</label>    
                    </div>
                    <center>
                        <button type="submit" name="submit" class="waves-effect waves-light btn green">
                            <i class="material-icons left">perm_identity</i>
                            se connecter
                        </button>
                        <br/><br/>
                        <a href="index.php?page=new">Nouveau utilisateur</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
