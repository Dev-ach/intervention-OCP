<?php
    if(ocp()==0){
        if(hp()==1)
        {
            header("location:index.php?page=hphome");
        }
        elseif(user()==1){
            header("location:index.php?page=home");
        }
    }
      
?>
<h2>Réclamation au fournisseur</h2>

<?php
     $posts=get_four();
     if(empty($posts)){
        header("location:index.php?page=ocphome");
     }
     if(isset($_POST["post"]))
                {
                    $name=$posts->name;
                    $email=$posts->email;
                    $marc=$posts->nom;
                    $type=$posts->type;
                    $ocpdescription = htmlspecialchars(trim($_POST['ocpdescription']));
                    
                    $errors=[];
                    
                    if(empty($ocpdescription))
                    {
                        $errors['empty']="Veuillez remplir la description OCP";
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
                        envoyer_four($name,$email,$marc,$type,$ocpdescription);
                    ?>
                    <div class="card green">
                        <div class="card-content white-text">
                            <p>Un message est envoyé sur <?=$email?></p>
                        </div>
                    </div>
                    <?php
                    }
                }
?>


    <div class="row">
        <fieldset> 
        <legend class="flow-text">Le fournisseur</legend>
        <fieldset> 
        <legend class="flow-text">Nom de fournisseur</legend>
        <div class="input-field col s12">
            <p><?=$posts->name?></p>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Code materiel</legend>
        <div class="input-field col s12">
            <p><?=$posts->materiel?></p>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Marc materiel</legend>
        <div class="input-field col s12">
            <p><?=$posts->nom?></p>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Type de materiel</legend>
        <div class="input-field col s12">
            <p><?=$posts->type?></p>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Fin de la garantie</legend>
        <div class="input-field col s12">
            <p><?=$posts->fingarantie?></p>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Contacter</legend>
        <div class="col s12 m6">
            <p><i class="material-icons prefix">email</i> <?=$posts->email?></p>
        </div>
        <div class="col s12 m6">
            <p><i class="material-icons prefix">call</i> <?=$posts->telephone?></p>
        </div>
        </fieldset>   
        </fieldset>
    </div>
    
    <center><button data-target="modal1" class="btn-floating modal-trigger btn-small waves-effect waves-light red tooltipped" data-position="bottom" data-delay="50" data-tooltip="email fournisseur"><i class="material-icons">message</i></button></center>
    </br></br>
    <div id="modal1" class="modal">
    <div class="modal-content">
      <form method="post">
        <div class="row">
            <fieldset> 
                <legend class="flow-text">OCP description<em style="color: red">*</em></legend>
                <div class="input-field col s12">
                    <textarea name="ocpdescription" id="ocpdescription" class="materialize-textarea flow-text"></textarea>
                    <label for="description">OCPdescription</label>
                </div>
            
            <div class="col s12">
                <center><button type="submit" name="post" class="btn"><i class="material-icons prefix">email</i>envoi email</button></center>
            </div>
            </fieldset>
        </div>
    </form>
    </div>
  </div>
<div class="fixed-action-btn vertical click-to-toggle  style="bottom: 45px; right: 24px;">
    <a href="index.php?page=ocpinter&id=<?=$posts->id?>" class="btn-floating btn-small waves-effect waves-light orange tooltipped" data-position="left" data-delay="50" data-tooltip="retour">
      <i class="material-icons">fast_rewind</i></a>
</div>