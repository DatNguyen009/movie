<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=768220467315915&autoLogAppEvents=1"
        nonce="aiWJ5oM9"></script>
</head>

<body style="overflow-y: hidden;">
    <?php include_once "cursor.php"; ?>
    <header>
        <div class="menu">
            <div class="logo">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png"
                        alt="logo"></a>
            </div>
            <div class="logo__worker">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/worker.png" alt="logo"></a>
            </div>
            <div class="menu_list_SP">
                <p id="menu_list_SP--princess">Princess</p>
                <p id="menu_list_SP--worker">Dai Ty Makeup</p>
            </div>

        </div>
    </header>
    <main>
        <div class="princess_login">
            <div class="princess_component">
                <h5 class="text-center">Đăng nhập</h5>
                <?php if(isset($_SESSION['sucsess_register'])): ?>
                <div class="alert alert-success" role="alert">
                    <p class="text-center">
                        <?php echo  $_SESSION['sucsess_register']; unset( $_SESSION['sucsess_register']); ?></p>
                </div>
                <?php endif; ?>
                <div class="princess_component--social">
                    <div class="facebook">
                        <a href="javascript:void(0)" onclick="fbLogin()"><i
                                class="fab fa-facebook-square"></i>Facebook</a>
                    </div>
                    <div class="google">
                        <a href="#"> <svg aria-hidden="true" class="svg-icon native iconGoogle" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z"
                                    fill="#4285F4"></path>
                                <path
                                    d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z"
                                    fill="#34A853"></path>
                                <path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z"
                                    fill="#FBBC05"></path>
                                <path
                                    d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z"
                                    fill="#EA4335"></path>
                            </svg>Google</a>
                    </div>
                </div>

                <p class="text-center" id="error_login"></p>

                <!-- <form action="/DAT/Skincare/MVC/models/login.php" method="post"> -->
                <div class="princess_component--input">
                    <div class="email">
                        <input id="form_email" type="email" name="user_name" class="form-control" placeholder="Email">
                    </div>
                    <div class="password">
                        <input id="form_pass" type="password" name="password" class="form-control"
                            placeholder="Mật Khẩu">
                    </div>
                </div>
                <div class="princess_component--resetpass">
                    <a href="/DAT/Skincare/Skincare/ResetPass/">Quên mật khẩu?</a>
                </div>
                <div class="princess_component--button">
                    <button id="login" type="submit" class="btn btn-success login" name="submit" onclick="Login()">Đăng
                        nhập</button>
                </div>
                <!-- </form> -->

                <div class="princess_component--register">
                    <p>Bạn chưa có tài khoản?</p>
                    <a href="/DAT/Skincare/Skincare/Register/">Đăng ký</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <div class="footer__princess">
                <div class="footer__princess--logo">
                    <img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png" alt="logo">
                </div>
                <div class="footer__princess--socical">
                    <div class="footer__socical--facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="footer__socical--instagram">
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>

            <div class="footer__worker">
                <div class="footer__princess--socical">
                    <div class="footer__socical--facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="footer__socical--instagram">
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>

                <div class="footer__princess--logo">
                    <img id="footer__worker--home" style="width: 40px; padding-top:20px; margin-left: 15px;"
                        src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
                </div>

            </div>
        </div>
        <div class="created text-center">
            <p>@Created Đạt Nguyễn</p>
        </div>
    </footer>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/login_fb.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function Login() {
        var user_name = document.querySelector("#form_email").value;
        var password = document.querySelector("#form_pass").value;
        var submit = "submit";
        var error_login = $("#error_login");
        $.ajax({
            url: "/DAT/Skincare/MVC/models/login.php",
            method: "POST",
            data: {
                user_name: user_name,
                password: password,
                submit: submit,
            },
            success: function(response) {
                console.log(response);
                if (response == "error_SDT") {
                    error_login.html(
                        "Số điện thoại không hợp lệ!");
                }
                if (response == "success") {
                    location.href = "/DAT/Skincare/Skincare/Home/";
                } else {
                    if (response == "error_pass") {
                        error_login.html(
                            "Mật khẩu không hợp lệ!");
                    } else {
                        if (response == "error_validateemail") {
                            error_login.html(
                                "Vui lòng nhập đúng địa chỉ Email!");
                        } else {
                            error_login.html(
                                "Email không hợp lệ!");
                        }

                    }

                }
            }
        });
    }
    </script>
    <script>
    var input = document.getElementById("form_pass");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("login").click();
        }
    });
    </script>
    <script>
    $("#menu_list_SP--princess").on("click", function() {
        location.href = "/DAT/Skincare/Skincare/AllProduct/";
    });
    </script>
    <script>
    $("#menu_list_SP--worker").on("click", function() {
        location.href = "/DAT/Skincare/Skincare/APDTMakeup/";
    });
    </script>
</body>

</html>