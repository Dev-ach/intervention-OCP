<?php
    if(hp()==0)
    {
        header("location:index.php?page=home");
    }
?>
<h2>List des demandes</h2>
<hr/>
<div class="row">
<?php
    $posts=get_demandes();
    if(!empty($posts)){
        foreach($posts as $post)
        {
?>
        <div class="col s12 m12 ">
            <div class="card">
              <div class="card-content">
                <span class="card-title"><?=$post->titre?></span>
                <h6 class="grey-text">Par <?=$post->edit?> le <?=date("d/m/Y",strtotime($post->date)); ?></h6>
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
                            <div class="chip white">
                                <i class="material-icons">av_timer</i>
                                non valide
                            </div>
                        </span></br></br>
                  <center><a style="color:green;" href="index.php?page=hpinter&id=<?=$post->id?>">Voir demande</a></center>
              </div>
            </div>
        </div>
<?php
    }
    }else{
        ?>
        <center>Auccune demandes à traiter</center>
        <?php
    }
?>
 