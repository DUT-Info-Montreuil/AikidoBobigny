$(function () {
         $(".ajouter_question_reponse").click(
             function(){
                if(($(".ajoutquestion_reponse").css("display")=="none")){
                    $(".ajoutquestion_reponse").css("display", "block");
                }else{
                    $(".ajoutquestion_reponse").css("display", "none");
                }
         })

         $(".repondrequestion").click(
            function(){
               var id = $(this).attr("targetID");
               if(($("#reponse"+id).css("display")=="none")){
                   $("#reponse"+id).css("display", "block");
               }else{
                   $("#reponse"+id).css("display", "none");
               }
        })

        $(".corrigerquestion").click(
            function(){
               var id = $(this).attr("targetID");
               if(($("#corriger"+id).css("display")=="none")){
                   $("#corriger"+id).css("display", "block");
               }else{
                   $("#corriger"+id).css("display", "none");
               }
        })


        $(".submit_modifier_question").click(function() {
            

            var targetID = $(this).attr("targetID");  
            var modifier_question = $("#modifier_question"+targetID).val();  
            var actionfaq = 4;
            console.log(targetID);
 
			if(modifier_question=='' ) {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();

            alert("il faut remplir \'modifier question\'");
			
			} else {
			$.ajax({
			type: "POST",
		    url: "./modules/mod_admin/adminfaq.php",
		    data: {modifier_question,targetID,actionfaq},
		    	success: function(){
					$('.success').fadeIn(200).show();
		    		$('.error').fadeOut(200).hide();
					alert("La question "+modifier_question+" a bien été modifié");
		   		}
			});
				}
		   return false;
			});



            $(".submit_reponse_faq").click(function() {
            
                var targetID = $(this).attr("targetID");
                var reponsefaq = $("#reponsefaq"+targetID).val();
                var question= $(this).attr("questionrep");
                var actionfaq = 3;
                console.log(targetID);
                if(reponsefaq=='') {
                $('.success').fadeOut(200).hide();
                $('.error').fadeOut(200).show();
                alert("il faut remplir les champs"); 
                } else {
                $.ajax({
                type: "POST",
                url: "./modules/mod_admin/adminfaq.php",
                data: {reponsefaq,targetID,actionfaq},
                    success: function(){
                        $('.success').fadeIn(200).show();
                        $('.error').fadeOut(200).hide();

                        alert("Votre reponse a la question : "+question+" a été publié vous pouvez vérifiez dans le module FAQ")

                       }
                });
                    }
               return false;
                }); 
                


         $(".submit_question_reponse").click(function() {
            
			/* VALUES */
		    var question_faq = $("#question_faq").val();
			var reponse_faq = $("#reponse_faq").val();
            var actionfaq = 2;
 
 
 
			if(question_faq=='' || reponse_faq=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			alert("Il faut remplir tous les champs ");
			} else {
			$.ajax({
			type: "POST",
		    url: "./modules/mod_admin/adminfaq.php",
		    data: {question_faq,reponse_faq,actionfaq},
            success: function(){
                $('.success').fadeIn(200).show();
                $('.error').fadeOut(200).hide();
                alert("question et reponse ajouté a la faq")
            }
        });
            }
        }); 

 



         $(".supprimerquestion_reponse").click(
            function(){
                var id = $(this).attr("targetID");
                var questionsup = $(this).attr("questionsupp");
                var reponsesupp = $(this).attr("reponsesupp");

                var actionfaq = 1
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/adminfaq.php",
                data: {targetID : id , actionfaq : actionfaq},
                success: function(){
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    alert("la question : " +questionsup +" et la reponse :"+reponsesupp+" ont été supprimées de la faq")
                }
            });
                
            }); 
 
 }); 