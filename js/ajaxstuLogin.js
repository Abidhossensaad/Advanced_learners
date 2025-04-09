 // Ajax call for Login Verification


 function CheckStuLogin() {
    var stuLogemail = $("#stuLogemail").val();
    var stuLogpass = $("#stuLogpass").val();

    $.ajax({
        url: "Student/addstudent.php",
        method: "POST",
        dataType: "json",
        data: {
            checkLogemail: "checklogemail",
            stuLogemail: stuLogemail,
            stuLogpass: stuLogpass,
        },
        success: function (data) {

            if (data == 0) {
                $("#statusLogMsg").html(
                    '<div class="alert alert-danger">Invalid Email Or Password</div>'
                );
            } else if (data == 1) {
                $("#statusLogMsg").html(
                    '<div class="spinner-border text-success" role="status"> </span></div>'
                );

                
                setTimeout(function () {
                    window.location.href = "index.php";
                }, 800);
            }
        },
        
    });
}
