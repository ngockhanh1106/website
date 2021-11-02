
$(document).ready(function (){
    function loadtaskGV() {
        $.ajax({
            url: "./ajax/showuserTeacher.php",
            type: "POST",
            success: function (data) {
                $("#showaccount").html(data);
            }
        })
    }
    //loadtaskGV();
    function loadtaskSV() {
        $.ajax({
            url: "./ajax/showuserStudent.php",
            type: "POST",
            success: function (data) {
                $("#showaccount").html(data);
            }
        })
    }
    //loadtaskSV();
    $("#account").on("change", function(){
        var acc = $("#account").val();
        if (acc == "teacher"){
            loadtaskGV();
        }else if (acc == "student"){
            loadtaskSV();
        }
    })
});