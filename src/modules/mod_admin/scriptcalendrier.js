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
    });