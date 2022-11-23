$(function () {
    var bolean = false;
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

         $(".supprimerquestion_reponse")
 
 }); 