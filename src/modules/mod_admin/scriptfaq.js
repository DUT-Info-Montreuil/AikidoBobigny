$(function () {
    var bolean = false;
    var boleancorrection=false;
         $(".ajouter_question_reponse").click(
             function(){
                if(bolean == false){
                    $(".ajoutquestion_reponse").css("display", "block");
                    bolean=true;
                }else{
                    $(".ajoutquestion_reponse").css("display", "none");
                    bolean=false;
                }
         })

         $(".submit_question_reponse").click(function() {
            
			/* VALUES */
		    var question_faq = $("#question_faq").val();
			var reponse_faq = $("#reponse_faq").val();
			
            var actionfaq = 2;
 
 
 
			if(question_faq=='' || reponse_faq=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			/* UNCOMMNENT TO SEND TO CONSOLE */
			/* console.log ("SOMETHING HAPPENS"); */
			} else {
			$.ajax({
			type: "POST",
		    url: "./modules/mod_admin/adminfaq.php",
		    data: {question_faq,reponse_faq,actionfaq},
		    	success: function(){
					$('.success').fadeIn(200).show();
		    		$('.error').fadeOut(200).hide();
					/* UNCOMMNENT TO SEND TO CONSOLE */
					/* console.log (dataString); console.log ("AJAX DONE"); */
		   		}
			});
				}//EOC
		   return false;
			}); //EOF
 



         $(".supprimerquestion_reponse").click(
            function(){
                var id = $(this).attr("targetID");
                var actionfaq = 1
            $.ajax({
                type : "POST",
                url : "./modules/mod_admin/adminfaq.php",
                data: {targetID : id , actionfaq : actionfaq}
            }).then(function(id){
                $("#"+id).remove();
            })
            }
         )
 
 }); 