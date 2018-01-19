<?php
    if(hp()==0)
    {
        header("location:index.php?page=home");
    }
    else{
        header('location: file/'.$_GET['id']);
    }
    
?>
