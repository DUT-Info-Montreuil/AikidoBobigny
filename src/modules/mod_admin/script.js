$(document).ready(function(){    
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var token = $("#token").val();    
        //Le probleme c'est l'id il recupere 1
        var id;
        if ($(this).val() == clickBtnValue) {
            id = $("#ID_adherent").val();
        }
        var ajaxurl = '../src/modules/mod_admin/admin.php';

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {'function': clickBtnValue, 'token': token, 'ID_adherent' : id},
            success: function(data) {
                alert("action performed successfully");
            }
        })
    });
});