

function addstu() {
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
 
    // Clear previous messages
    $("#statusMsg1, #statusMsg2, #statusMsg3").html("");
    $('#signupSuccessMessage').html("");

    // Form validation
    if(stuname.trim() == "") {
        $("#statusMsg1").html("<small style='color:red'>Please Enter Name!</small>");
        $("#stuname").focus();
        return false;
    }
    else if(stuemail.trim() == "") {
        $("#statusMsg2").html("<small style='color:red'>Please Enter Email!</small>");
        $("#stuemail").focus();
        return false;
    }
    else if(stupass.trim() == "") {
        $("#statusMsg3").html("<small style='color:red'>Please Enter Password!</small>");
        $("#stupass").focus();
        return false;
    }
    else if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(stuemail)) {
        $("#statusMsg2").html("<small style='color:red'>Invalid Email Format!</small>");
        $("#stuemail").focus();
        return false;
    }
    else {
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            dataType: "json",
            data: {
                stusignup: "signup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function(data) {
                console.log(data);
                if(data == "OK") {
                    $('#signupSuccessMessage').html("<span class='alert alert-success'>Successfully Signup!</span>");
                    // Clear form on success
                    $("#stuname, #stuemail, #stupass").val("");
                } 
                else if(data == "Failed") {
                    $('#signupSuccessMessage').html("<span class='alert alert-danger'>Unable to Signup!</span>");
                }
                else {
                    // Show specific error messages from server
                    $('#signupSuccessMessage').html("<span class='alert alert-danger'>" + data + "</span>");
                }
            },
            error: function() {
                $('#signupSuccessMessage').html("<span class='alert alert-danger'>Request failed. Please try again.</span>");
            }
        });
    }   
}