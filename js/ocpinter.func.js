$(document).ready(function(){
    //fonction du button valider
    $('.valid_ocpinter').click(function(){
        var id= $(this).attr("id");
        $.post('ajax/ocpvalidation.php',{id:id})
    });
});
