$(document).ready(function (){
    
    $("#uploadImage").on("change",function(){
        var img = $("#uploadImage")[0].files[0];
        var formData = new FormData();
        formData.append("img",img);
        $.ajax({
            url: "ajaxupload.php",
            type: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData:false, 
            beforeSend : function(){
                $("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function(data){
                if(data=='invalid'){
                    // invalid file format.
                    $("#err").html("Invalid File !").fadeIn();
                }else{
                    // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    //$("#formImg")[0].reset(); 
                }
            },
            error: function(e) {
                $("#err").html(e).fadeIn();
            }          
        });
    }); 
});