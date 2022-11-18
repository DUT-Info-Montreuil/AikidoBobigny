$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'index.php?module=admin',
        data =  {'function': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            alert("action performed successfully");
        });
    });
});