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
            alert("L'adhérent "+nom +" "+prenom+" a bien été  supprimé ");
           }
        })
    });

    $(".validermail").click(
        function(){
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var validmail = $(this).attr("validmail");
            var actionadherent = 2;
            if(validmail==1) {
                $('.success').fadeOut(200).hide();
                $('.error').fadeOut(200).show();
    
                alert("Le mail de "+nom + " "+ prenom +" a déja été validé");
                
            } else {
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
            }
            });

    $(".validerinscription").click(
        function(){
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var validinscrip = $(this).attr("validinscrip");
            var actionadherent = 3;
            if(validinscrip==1) {
                $('.success').fadeOut(200).hide();
                $('.error').fadeOut(200).show();
    
                alert("L'inscription de "+nom + " "+ prenom +" a déja été validé");
                
            } else {
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
            }
            });

    $(".passeradmin").click(
        function(){
            var id = $(this).attr("targetID");
            var nom = $(this).attr("nom");
            var prenom = $(this).attr("prenom");
            var admin = $(this).attr("admin");
            var actionadherent = 4;
            if(admin==1) {
                $('.success').fadeOut(200).hide();
                $('.error').fadeOut(200).show();
    
                alert(nom + " "+ prenom +"a déja été passé en tant que admin");
                
            } else {
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
            }
            });


            $(".enleverinscription").click(
                function(){
                    var id = $(this).attr("targetID");
                    var nom = $(this).attr("nom");
                    var prenom = $(this).attr("prenom");
                    var validinscrip = $(this).attr("validinscrip");
                    var actionadherent = 5;
                    if(validinscrip==0) {
                        $('.success').fadeOut(200).hide();
                        $('.error').fadeOut(200).show();
            
                        alert("L'inscription de "+nom + " "+ prenom +" n'est déja pas validé");
                        
                    } else {
                    $.ajax({
                        type : "POST",
                        url : "./modules/mod_admin/admininscription.php",
                        data: {targetID : id , actionadherent : actionadherent},
                        success: function(){
                            $('.success').fadeIn(200).show();
                            $('.error').fadeOut(200).hide();
                            alert("L'inscription de "+nom +" "+prenom+" a bien été dévalidé");
                           }
                        })
                    }
                    });

            $(".enlevermail").click(
                function(){
                    var id = $(this).attr("targetID");
                    var nom = $(this).attr("nom");
                    var prenom = $(this).attr("prenom");
                    var validmail = $(this).attr("validmail"); 
                    var actionadherent = 6;                    
                            if(validmail==0) {
                                $('.success').fadeOut(200).hide();
                                $('.error').fadeOut(200).show();
                    
                                alert("Le mail de "+nom + " "+ prenom +" n'est déja pas validé");
                                
                            } else {
                            $.ajax({
                                type : "POST",
                                url : "./modules/mod_admin/admininscription.php",
                                data: {targetID : id , actionadherent : actionadherent},
                                success: function(){
                                    $('.success').fadeIn(200).show();
                                    $('.error').fadeOut(200).hide();
                                    alert("Le mail de "+nom +" "+prenom+" a bien été dévalidé");
                                   }
                                })
                            }
                            });

                     
});
