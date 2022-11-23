$(function () {
   $(".supprimeradherent").click(
        function(){
            
            var id = $(this).attr("targetID");
            var actionadherent = 1
        $.ajax({
            type : "POST",
            url : "./modules/mod_admin/admin.php",
            data: {targetID : id , actionadherent : actionadherent}
        }).then(function(id){
            $("#"+id).remove();
        })

})
});     
    