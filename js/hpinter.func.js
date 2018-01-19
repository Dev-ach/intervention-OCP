$(document).ready(function(){
    //fonction du button valider
    $('.valid_inter').click(function(){
        var id= $(this).attr("id");
        $.post('ajax/validation.php',{id:id})
    });
});