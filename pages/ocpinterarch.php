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
<h2>La demande</h2>
<?php
     $posts=get_ocpinterarch();
     if(empty($posts)){
          header("location:index.php?page=ocphome");
     }
     foreach($posts as $post){
        $dest1 = $post->dest;
        $contact1 = $post->contact;
        $categorie1 = $post->categorie;
        $urgence1 = $post->urg;
        $service1 = $post->serv;
        $titre1 = $post->titre;
        $description1 = $post->description;
        $hpedit=$post->hpedit;
        $hpdate=$post->hpdate;
     }
     if(isset($_POST['post'])){
        valid($post->id);
     }
?>


<div class="row">
    <fieldset> 
    <legend class="flow-text">Par <?=$post->edit?> le <?=$post->date?></legend>
    <fieldset> 
    <legend class="flow-text">Destinataire du service</legend>
    <div class="input-field col s12">
        <p><?=$dest1?></p>
    </div>
    </fieldset> 
    <fieldset> 
    <legend class="flow-text">Contact principal</legend>
    <div class="input-field col s12">
        <p><?=$contact1?></p>
    </div>
    </fieldset> 
    <fieldset> 
    <legend class="flow-text">Categorie</legend>
    <div class="input-field col s12">
        <p><?=$categorie1?></p>
    </div>
    </fieldset> 
    <fieldset> 
    <legend class="flow-text">Urgence</legend>
    <div class="input-field col s12">
        <p><?=$urgence1?></p>
    </div>
    </fieldset> 
    <fieldset> 
    <legend class="flow-text">Service</legend>
    <div class="input-field col s12">
        <p><?=$service1?></p>
    </div>
    </fieldset> 
    <fieldset> 
    <legend class="flow-text">Titre</legend>
    <div class="input-field col s12">
        <p><?=$titre1?></p>
    </div>
    </fieldset> 
    <fieldset> 
    <legend class="flow-text">Description</legend>
    <div class="input-field col s12">
        <p><?=$description1?></p>
    </div>
    </fieldset>
    <fieldset> 
    <legend class="flow-text">Materiel</legend>
    <div class="input-field col s12">
        <p><?=$post->materiel?></p>
    </div>
    </fieldset>
    <fieldset> 
    <legend class="flow-text">HP intervenant</legend>
    <div class="input-field col s12">
        <p><?=$hpedit?></p>
    </div>
    </fieldset>
    <fieldset>
    <legend class="flow-text">Date d'envoi HP</legend>
    <div class="input-field col s12">
        <p><?=$hpdate?></p>
    </div>
    </fieldset>
    <fieldset> 
    <legend class="flow-text">HP description de l'intervention</legend>
    <div class="input-field col s12">
        <p><?=$post->hpdescription?></p>
    </div>
    </fieldset>
    <fieldset> 
    <legend class="flow-text">Ocp validateur</legend>
    <div class="input-field col s12">
        <p><?=$post->ocpedit?></p>
    </div>
    </fieldset>
    <fieldset> 
    <legend class="flow-text">Date de validation</legend>
    <div class="input-field col s12">
        <p><?=$post->ocpdate?></p>
    </div>
    </fieldset>
    <div class="col s12">
      <?php
           if(!empty($post->file)){         
      ?>
            <p><a href="index.php?page=telecharger&id=<?=$post->file?>" class="btn">fichier</a></p>
      <?php
           }else{
      ?>
           <p><a href="#" class="btn disabled">fichier</a></p>
      <?php
           }
      ?>
       
    </div>

    </fieldset>
</div>
<div class="fixed-action-btn vertical click-to-toggle" style="bottom: 45px; right: 24px;">
    <a href="index.php?page=ocparchives" class="btn-floating btn-small waves-effect waves-light orange tooltipped" data-position="left" data-delay="50" data-tooltip="retour"><i class="material-icons">fast_rewind</i></a>
</div>
