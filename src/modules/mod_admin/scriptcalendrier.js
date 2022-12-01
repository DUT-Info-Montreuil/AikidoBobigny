$(function () {
    $(".suppevenement").click(
         function(){
             
             var id = $(this).attr("targetID");
             var actioncalendrier = 1;
         $.ajax({
             type : "POST",
             url : "./modules/mod_admin/admin.php",
             data: {targetID : id , actioncalendrier : actioncalendrier}
         }).then(function(id){
             $("#"+id).remove();
         })
     })

     var bolean = false;
          $(".ajouter_evenement").click(
              function(){
                 if(bolean == false){
                     $(".ajoutevenement").css("display", "block");
                     bolean=true;
                 }else{
                     $(".ajoutevenement").css("display", "none");
                     bolean=false;
                 }
          })

          $(".submit_evenement").click(function() {
            
			/* VALUES */
		    var intitule = $("#intitule").val();
			var description = $("#description").val();
            var datedebut = $("#datedebut").val();
            var datefin = $("#datefin").val();
			
            var actioncalendrier = 2;
 
 
 
			if(intitule=='' || description=='' || datedebut=='' || datefin=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			/* UNCOMMNENT TO SEND TO CONSOLE */
			console.log ("SOMETHING HAPPENS"); 
			} else {
			$.ajax({
			type: "POST",
		    url: "./modules/mod_admin/admincalendrier.php",
		    data: {intitule,description,datedebut,datefin,actioncalendrier},
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
          
    });