$(function () {
   $(".supprimeradherent").click(
        function(){
            
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var actionadherent = 1;
        $.ajax({
            type : "POST",
            url : "./modules/mod_admin/admininscription.php",
            data: {targetID : id , actionadherent : actionadherent},
               success: function(){
            $('.success').fadeIn(200).show();
            $('.error').fadeOut(200).hide();
            alert("L'adhérent"+nom +" "+prenom+" a bien été modifié supprimé ");
           }
        })
    });

    $(".validermail").click(
        function(){
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var actionadherent = 2;
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/admininscription.php",
                data: {targetID : id , actionadherent : actionadherent},
                success: function(){
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    alert("Le mail de "+nom +" "+prenom+" a été validé");
                   }
                })
            });

    $(".validerinscription").click(
        function(){
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var actionadherent = 3;
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/admininscription.php",
                data: {targetID : id , actionadherent : actionadherent},
                success: function(){
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    alert("L'inscription de "+nom +" "+prenom+" a été validé");
                   }
                })
            });

    $(".passeradmin").click(
        function(){
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var actionadherent = 4;
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/admininscription.php",
                data: {targetID : id , actionadherent : actionadherent},
                success: function(){
                    $('.successs').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    alert("Le passage en tant d'admin a été effectué pour "+nom +" "+prenom);
                   }
                })
            });

});
