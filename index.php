   <?php
  //chargement de la base de donnees
   include 'functions/main-functions.php';
  //Test sur l'existence de la page
   $pages=scandir('pages/');
   if(isset($_GET['page']) && !empty($_GET['page']))
   {
        if(in_array($_GET['page'].'.php',$pages))
        {
            $page=$_GET['page'];
        }
        else
        {
            $page="error";
        }    
   }
   else
   {
        $page="login";
   }
   //charger la fonction de la page
   $pages_functions=scandir('functions/');
   if(in_array($page.'.func.php',$pages_functions))
   {
        include 'functions/'.$page.'.func.php';
   }
  
  ?>
  
  
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <title>Blog | Administration</title>    
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!-- la bar de menu -->
        <?php
          if($page != 'login' && $page !='new' && $page !='newad' && !isset($_SESSION['admin']))
          {
               header("location:index.php?page=login");
          }
          include 'body/topbar.php';
        ?>
        <!-- la page choisi par l'utilisateur -->
        <div class="container">
            <?php
                include 'pages/'.$page.'.php';
            ?>
        </div>
        
        
        
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
        <!-- importe le script javascript qui fonctionne sur toutes les page-->
        <script type="text/javascript" src="js/script.js"></script>
        <?php
        $pages_functions=scandir('js/');
               if(in_array($page.'.func.js',$pages_functions))
               {
        ?>        
                    <script type="text/javascript" src="js/<?=$page?>.func.js"></script>
        <?php            
               }
        ?>
    </body>
  </html>