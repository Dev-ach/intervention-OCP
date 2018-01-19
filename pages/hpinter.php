<?php
    if(hp()==0)
    {
        header("location:index.php?page=home");
    }
?>
<h2>La demande</h2>
<?php
     $posts=get_inter();
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
        $materiel=$post->materiel;
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
            <p><?=$materiel?></p>
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
    <a class="btn-floating btn-large green">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a href="index.php?page=hpdemande&id=<?=$post->id?>" class="btn-floating btn-small waves-effect waves-light red tooltipped" data-position="left" data-delay="50" data-tooltip="renvoyer"><i class="material-icons">message</i></a></li>
      <li><a href="index.php?page=hphome" id="<?=$post->id?>" class="btn-floating btn-small waves-effect waves-light blue valid_inter tooltipped" data-position="left" data-delay="50" data-tooltip="valider"><i class="material-icons">done</i></a></li>
      <li><a href="index.php?page=hphome" class="btn-floating btn-small waves-effect waves-light orange tooltipped" data-position="left" data-delay="50" data-tooltip="retour"><i class="material-icons">fast_rewind</i></a></li>
    </ul>
  </div>