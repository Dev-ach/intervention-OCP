<?php
    if(hp()==0)
    {
        header("location:index.php?page=home");
    }
?>
<h2>Mise à jour de la demande</h2>
<?php
     $posts=get_demande();
     if(empty($posts)){
          header("location:index.php?page=hphome");
     }
     foreach($posts as $post){
        $dest1 = $post->dest;
        $contact1 = $post->contact;
        $categorie1 = $post->categorie;
        $urgence1 = $post->urg;
        $service1 = $post->serv;
        $titre1 = $post->titre;
        $description1 = $post->description;
     }
    if(isset($_POST['post']))
    {
        $dest = htmlspecialchars(trim($_POST['dest']));
        $contact = htmlspecialchars(trim($_POST['contact']));
        $categorie = htmlspecialchars(trim($_POST['categorie']));
        $urgence = htmlspecialchars(trim($_POST['urgence']));
        $service = htmlspecialchars(trim($_POST['service']));
        $titre = htmlspecialchars(trim($_POST['titre']));
        $hpdescription = htmlspecialchars(trim($_POST['hpdescription']));

        $errors = [];

        if(empty($dest) || empty($contact) || empty($categorie) || empty($urgence) || empty($titre) || empty($hpdescription))
        {
            $errors['empty'] = "Veuillez remplir tous les champs";
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
            post($dest,$contact,$categorie,$urgence,$service,$titre,$hpdescription);
            ?>
                <div class="card green">
                    <div class="card-content white-text">
                        <p>votre demande est envoyer à ocp</p>
                    </div>
                </div>
            <?php
            
        }
    }


?>

<form method="post" enctype="multipart/form-data">
    <div class="row">
        <fieldset> 
        <legend class="flow-text">Information sur le contact</legend>
        <div class="input-field col s12">
            <input  type="text" name="dest" id="dest" class="validate" value="<?=$dest1?>"/>
            <label for="title">Destinataire du service<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <input type="text" name="contact" id="contact" class="validate" value="<?=$contact1?>"/>
            <label for="title">Contact principal<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <select name="categorie">
              <option value="<?=$categorie1?>" selected><?=$categorie1?></option>
              <option value="reclamation">reclamation</option>
              <option value="incident">incident</option>
              <option value="demande d'information">demande d'information</option>
              <option value="demande de service">demande de service</option>
            </select>
            <label>Categorie<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <select name="urgence">
              <option value="<?=$urgence1?>" selected><?=$urgence1?></option>
              <option value="Critique">Critique</option>
              <option value="Élevée">Élevée</option>
              <option value="Moyenne">Moyenne</option>
              <option value="Faible">Faible</option>
            </select>
            <label>Urgence<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <select name="service">
              <option value="<?=$service1?>" selected><?=$service1?></option>
              <option value="Achat">Achat</option>
              <option value="BPM">BPM</option>
              <option value="Collaboratif">Collaboratif</option>
              <option value="commercial">commercial</option>
              <option value="Finance/Comptabilité">Finance/Comptabilité</option>
              <option value="Géologie">Géologie</option>
            </select>
            <label>Service</label>
        </div>
        </fieldset>
        <fieldset> 
        <legend class="flow-text">Titre<em style="color: red">*</em></legend>
        <div class="input-field col s12">
            <input type="text" name="titre" id="titre" class="validate" value="<?=$titre1?>"/>
             <label for="titre">Titre</label>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Description<em style="color: red">*</em></legend>
        <div class="input-field col s12">
            <p></p><?=$description1?></p>
        </div>
        </fieldset>
        <fieldset> 
        <legend class="flow-text">Materiel</legend>
        <div class="input-field col s12">
            <p><?=$post->materiel?></p>
        </div>
        </fieldset>
        <fieldset> 
        <legend class="flow-text">HP description de l'intervention<em style="color: red">*</em></legend>
        <div class="input-field col s12">
            <textarea name="hpdescription" id="hpdescription" class="materialize-textarea flow-text"></textarea>
            <label for="description">HPdescription</label>
        </div>
        </fieldset>
        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Renvoyer à ocp</button>
        </div>
    </div>
</form>
<div class="fixed-action-btn vertical click-to-toggle  style="bottom: 45px; right: 24px;">
    <a href="index.php?page=hpinter&id=<?=$post->id?>" class="btn-floating btn-small waves-effect waves-light orange tooltipped" data-position="left" data-delay="50" data-tooltip="retour">
      <i class="material-icons">fast_rewind</i></a>
</div>