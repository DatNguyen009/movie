$("#login").on("click", function() {
    var user_name = $("#username").val();
    var password = $("#password").val();
    var error_email = $("#error_email");
    var error_pass = $("#error_pass");
    var error_login = $("#error_login");
    var error_email = error_email.html("");
    var error_pass = error_pass.html("");

    if (user_name == "") {
        error_email.html("Email không được để trống");
        return false;
    }
    // Kiểm tra nếu password rỗng thì báo lỗi
    if (password == "") {
        error_pass.html("Mật khẩu không được để trống");
        return false;
    }
    // để kiểm tra thông tin đăng nhập hợp lệ hay chưa
    $.ajax({
        url: "/DAT/Skincare/MVC/models/login.php",
        method: "POST",
        data: {
            user_name: user_name,
            password: password,
        },
        success: function(response) {

            if (response == "0") {
                error_login.html(
                    "Username không hợp lệ!");
                $("#nofi_del").css("display", "block");

            } else {
                if (response == "1") {
                    error_login.html(
                        "Mật khẩu không hợp lệ!");
                    $("#nofi_del").css("display", "block");

                } else {
                    if (response == "2") {
                        location.href = "/DAT/Skincare/Admin/Manager/";
                    } else {
                        if (response == "3") {
                            location.href = "/DAT/Skincare/AdminWorker/Manager/";
                        }

                    }

                }

            }
        }
    });
});