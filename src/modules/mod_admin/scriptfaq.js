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
            
			/* VALUES */
		    var modifier_question = $("#modifier_question").val();
            var id = $(this).attr("targetID");    
            var actionfaq = 3;
 
 
 
			if(modifier_question=='' ) {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			/* UNCOMMNENT TO SEND TO CONSOLE */
			console.log ("SOMETHING HAPPENS"); 
			} else {
			$.ajax({
			type: "POST",
		    url: "./modules/mod_admin/adminfaq.php",
		    data: {modifier_question,id,actionfaq},
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


            $(".submit_reponse_faq").click(function() {
            
                /* VALUES */
                var reponse_faq1 = $("#reponsefaq").val();
                var id = $(this).attr("targetID");
                var actionfaq = 4;
     
     
     
                if(reponse_faq1=='') {
                $('.success').fadeOut(200).hide();
                $('.error').fadeOut(200).show();
                /* UNCOMMNENT TO SEND TO CONSOLE */
                console.log ("SOMETHING HAPPENS"); 
                } else {
                $.ajax({
                type: "POST",
                url: "./modules/mod_admin/adminfaq.php",
                data: {reponse_faq1,id,actionfaq},
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
                


         $(".submit_question_reponse").click(function() {
            
			/* VALUES */
		    var question_faq = $("#question_faq").val();
			var reponse_faq = $("#reponse_faq").val();
			
            var actionfaq = 2;
 
 
 
			if(question_faq=='' || reponse_faq=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			/* UNCOMMNENT TO SEND TO CONSOLE */
			console.log ("SOMETHING HAPPENS"); 
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