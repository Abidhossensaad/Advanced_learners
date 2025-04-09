 // Ajax call for admin Login Verification


 function CheckAdminLogin() {
    var adminLogemail = $("#adminLogemail").val();
    var adminLogpass = $("#adminLogpass").val();

    $.ajax({
        url: "Admin/admin.php", // 🔁 Change if path is wrong!
        method: "POST",
        dataType: "json",
        data: {
            checkLogemail: "checklogemail",
            adminLogemail: adminLogemail,
            adminLogpass: adminLogpass,
        },
        success: function (data) {
            console.log("Server response:", data); 

            if (data == 1) {
                $("#statusAdminLogMsg").html(
                    '<div class="spinner-border text-success" role="status"></div>'
                );

                setTimeout(function () {
                    window.location.href = "Admin/adminprofile.php";
                }, 800);
            } else {
                $("#statusAdminLogMsg").html(
                    '<div class="alert alert-danger">Invalid Email Or Password</div>'
                );
            }
        },
        
    });
}

