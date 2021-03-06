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
<h2>List des archives</h2>
<hr/>
<div class="row">
<?php
    $posts=get_archives();
    if(!empty($posts)){
    foreach($posts as $post)
    {
        if($post->valid=='ocp'){   
?>
        <div class="col s12 m12 ">
            <div class="card">
              <div class="card-content">
                <span class="card-title"><?=$post->titre?></span>
                <h6 class="grey-text">Valider par <?=$post->ocpedit?> le <?=date("d/m/Y",strtotime($post->ocpdate)); ?></h6>
                <p><?= substr(nl2br($post->description),0,100)?>...</p></p>
              </div>
              <div class="card-action">
                  <?php
                    if($post->urg=='Critique'){
                        ?>
                        <span>
                            <div class="chip red">
                                <i class="material-icons">info_outline</i>
                                <?=$post->urg?>
                            </div>
                        </span>
                        <?php
                    }
                  ?>
                  <?php
                    if($post->urg=='Élevée'){
                        ?>
                        <span>
                            <div class="chip orange">
                                <i class="material-icons">info_outline</i>
                                <?=$post->urg?>
                            </div>
                        </span>
                        <?php
                    }
                  ?>
                  <?php
                    if($post->urg=='Moyenne'){
                        ?>
                        <span>
                            <div class="chip yellow">
                                <i class="material-icons">info_outline</i>
                                <?=$post->urg?>
                            </div>
                        </span>
                        <?php
                    }
                  ?>
                  <?php
                    if($post->urg=='Faible'){
                        ?>
                        <span>
                            <div class="chip white">
                                <i class="material-icons">info_outline</i>
                                <?=$post->urg?>
                            </div>
                        </span>
                        <?php
                    }
                  ?>
                  <span>
                            <div class="chip green">
                                <i class="material-icons">done</i>
                                valider
                            </div>
                        </span></br></br>
                  <center><a style="color:green;" href="index.php?page=ocpinterarch&id=<?=$post->id?>">Voir demande</a></center>
              </div>
            </div>
        </div>
<?php
        }
    }
    }else{
        ?>
        <center>Aucune demande n'a été archivé</center>
        <?php
    }
?>

