$(function () {

   $(".supprimeradherent").click(
        function(){
            
            var id = $(this).attr("targetID");
            var actionadherent = 1;
        $.ajax({
            type : "POST",
            url : "./modules/mod_admin/admin.php",
            data: {targetID : id , actionadherent : actionadherent}
        }).then(function(id){
            $("#"+id).remove();
        })
    })

    $(".validermail").click(
        function(){
            var id = $(this).attr("targetID");
            var actionadherent = 2;
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/admin.php",
                data: {targetID : id , actionadherent : actionadherent}
            }).then(function(id){
                $("#"+id).remove();
            })
        }
    )

    $(".validerinscription").click(
        function(){
            var id = $(this).attr("targetID");
            var actionadherent = 3;
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/admin.php",
                data: {targetID : id , actionadherent : actionadherent}
            }).then(function(id){
                $("#"+id).remove();
            })
        }
    )

    $(".passeradmin").click(
        function(){
            var id = $(this).attr("targetID");
            var actionadherent = 4;
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/admin.php",
                data: {targetID : id , actionadherent : actionadherent}
            }).then(function(id){
                $("#"+id).remove();
            })
        })

});
