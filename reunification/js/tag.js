$(document).ready( function () { 
    $("#button").click( function() {                        
        $.ajax({ 
           type: "POST", 
           url: "php/Vlogin.php", 
           data: "tag="+$(this).val(), 
           success: function(msg){
          $("#case_one").detach()
          msg.appendTo( "body" );
           }
        });
        return false; 
});
})