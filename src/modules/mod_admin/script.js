$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var token = $("#token").val();
        var id = $("ID_adherent").val();
        alert(id);
        var ajaxurl = '../src/modules/mod_admin/admin.php',
        data =  {'function': clickBtnValue, 'token': token, 'ID_adherent': id};
        $.post(ajaxurl, data, function (response) {
            alert("action performed successfully");
        });
    });
});