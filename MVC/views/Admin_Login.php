<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/DAT/Skincare/Public/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/DAT/Skincare/Public/assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <span class="login100-form-title p-b-32">
                    Admin Login
                </span>
                <p id="error_login"></p>
                <span class="txt1 p-b-11">
                    Username
                </span>
                <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                    <input class="input100" type="text" name="username" id="username">
                    <span class="focus-input100"></span>

                </div>
                <p id="error_email" style="color: red;"></p>
                <span class="txt1 p-b-11">
                    Password
                </span>
                <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                    <span class="btn-show-pass">
                        <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password" id="password">
                    <span class="focus-input100"></span>

                </div>
                <p id="error_pass" style="color: red;"></p>
                <div class="container-login100-form-btn" style="margin-top: 20px;" id="login">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/Checklogin.js"></script>
    <script>
    var input = document.getElementById("password");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("login").click();
        }
    });
    </script>
    <!--===============================================================================================-->
    <!-- <script src="/assets/vendor/jquery/jquery-3.2.1.min.js"></script> -->
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <!-- <script src="/assets/js/main.js"></script> -->
</body>

</html>