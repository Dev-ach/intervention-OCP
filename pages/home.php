<?php
    if(hp()==1)
    {
        header("location:index.php?page=hphome");
    }
    elseif(ocp()==1){
       header("location:index.php?page=ocphome"); 
    }
?>
<h2>Soumettre une demande</h2>
<?php
    $materiels=mat_user($_SESSION['admin']);
    if(isset($_POST['post']))
    {
        $dest = htmlspecialchars(trim($_POST['dest']));
        $contact = htmlspecialchars(trim($_POST['contact']));
        $categorie =isset($_POST['categorie']) ? htmlspecialchars(trim($_POST['categorie'])) : NULL;
        $urgence =isset($_POST['urgence']) ? htmlspecialchars(trim($_POST['urgence'])) : NULL;
        $service =isset($_POST['service']) ? htmlspecialchars(trim($_POST['service'])) : NULL;
        $titre = htmlspecialchars(trim($_POST['titre']));
        $description = htmlspecialchars(trim($_POST['description']));
        $materiel=$materiels['usmateriel'];

        $errors = [];

        if(empty($dest) || empty($contact) || $categorie=="rien" || $urgence=="rien" || empty($titre) || empty($description))
        {
            $errors['empty'] = "Veuillez remplir tous les champs";
        }

        if(!empty($_FILES['fichier']['name']))
        {
            $file = $_FILES['fichier']['name'];
            $extensions = ['.pdf','.docx','.dotx','.txt','.xlsx','.zip','.PDF','.DOCX','.DOTX','.TXT','.XLSX'];
            $extension = strrchr($file,'.');

            if(!in_array($extension,$extensions))
            {
                $errors['fichier'] = "Ce fichier n'est pas valable";
            }
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
            post($dest,$contact,$categorie,$urgence,$service,$titre,$description,$materiel);
            if(!empty($_FILES['fichier']['name']))
            {
                
                file_post($_FILES['fichier']['tmp_name'], $extension);
            }
            
            ?>
                <div class="card green">
                    <div class="card-content white-text">
                        <p>votre demande est envoyer</p>
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
            <input type="text" name="dest" id="dest"/>
            <label for="title">Destinataire du service<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <input type="text" name="contact" id="contact"/>
            <label for="title">Contact principal<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <select name="categorie">
              <option value="" disabled selected>Choisissez la categorie</option>
              <option value="reclamation">reclamation</option>
              <option value="incident">incident</option>
              <option value="demande d'information">demande d'information</option>
              <option value="demande de service">demande de service</option>
            </select>
            <label>Categorie<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <select name="urgence">
              <option value="" disabled selected>Choisissez l'urgence</option>
              <option value="Critique">Critique</option>
              <option value="Élevée">Élevée</option>
              <option value="Moyenne">Moyenne</option>
              <option value="Faible">Faible</option>
            </select>
            <label>Urgence<em style="color: red">*</em></label>
        </div>
        <div class="input-field col s12">
            <select name="service">
              <option value="" disabled selected>Choisissez le service</option>
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
            <input type="text" name="titre" id="titre"/>
             <label for="titre">Titre</label>
        </div>
        </fieldset> 
        <fieldset> 
        <legend class="flow-text">Description<em style="color: red">*</em></legend>
        <div class="input-field col s12">
            <textarea name="description" id="description" class="materialize-textarea flow-text"></textarea>
            <label for="description">Description</label>
        </div>
        </fieldset>
        <div class="col s12">
            <div class="input-field file-field">
                <div class="btn col s2">
                    <input type="file" name="fichier" class="col s12"/>
                    <span>Ajouter des fichier</span>
                </div>
                <input type="text" class="file-path col s10" readonly/>
            </div>
        </div>

        <div class="col s6 right-align">
            <br/><br/>
            <button class="btn" type="submit" name="post">Soumettre</button>
        </div>
    </div>
</form>

