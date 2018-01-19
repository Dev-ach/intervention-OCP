<div class="navbar-fixed">
    <nav class="black"/>
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php?page=home" class="brand-logo"><img src="img/ocp.png" height="60" width="50"> </a>
                <?php
                if($page!="login" && $page!="new")
                {
                ?>
                <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php
                    if(hp()==1){
                    ?>
                    <li class="<?php echo($page=="hphome")?"active green":""; ?>"><a href="index.php?page=hphome"><i class="material-icons">report_problem</i></a></li>
                    <li class="<?php echo($page=="hparchives")?"active green":""; ?>"><a href="index.php?page=hparchives"><i class="material-icons">library_books</i></a></li>
                    <?php
                    }
                    if(ocp()==1){
                    ?>
                    <li class="<?php echo($page=="ocphome")?"active green":""; ?>"><a href="index.php?page=ocphome"><i class="material-icons">report_problem</i></a></li>
                    <li class="<?php echo($page=="ocparchives")?"active green":""; ?>"><a href="index.php?page=ocparchives"><i class="material-icons">library_books</i></a></li>
                    <?php
                    }
                    ?>
                    <li><a href="index.php?page=logout">Quitter</a></li>
                </ul>
                <ul class="side-nav" id="mobile-menu">
                    <?php
                    if(hp()==1){
                    ?>
                    <li class="<?php echo($page=="hphome")?"active green":""; ?>"><a href="index.php?page=hphome"><i class="material-icons">report_problem</i></a></li>
                    <li class="<?php echo($page=="hparchives")?"active green":""; ?>"><a href="index.php?page=hparchives"><i class="material-icons">library_books</i></a></li>
                    <?php
                    }
                    if(ocp()==1){
                    ?>
                    <li class="<?php echo($page=="ocphome")?"active green":""; ?>"><a href="index.php?page=ocphome"><i class="material-icons">report_problem</i></a></li>
                    <li class="<?php echo($page=="ocparchives")?"active green":""; ?>"><a href="index.php?page=ocparchives"><i class="material-icons">library_books</i></a></li>
                    <?php
                    }
                    ?>
                    <li><a href="index.php?page=logout">Quitter</a></li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>