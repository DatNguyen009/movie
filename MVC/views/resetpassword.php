<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset PassWord</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
    <?php include_once "cursor.php"; ?>
    <header>
        <div class="menu">
            <div class="logo">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png"
                        alt="logo"></a>
            </div>
            <div class="menu_list_SP">
                <p>Princess</p>
                <p>Dai Ty Makeup</p>
            </div>

        </div>
    </header>
    <main>
        <div class="princess_login">
            <div class="princess_component">
                <h5 class="text-center">Đổi mật khẩu</h5>
                <?php if(isset( $_SESSION['error'] )): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo  $_SESSION['error']; unset( $_SESSION['error'] );  ?>
                </div>
                <?php endif; ?>
                <?php if(isset( $_SESSION['success'] )): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo  $_SESSION['success']; unset( $_SESSION['success'] );  ?>
                </div>
                <?php endif; ?>
                <form action="/DAT/Skincare/MVC/models/resetpass.php" method="post">
                    <div class="princess_component--inputregister">
                        <div class="email">
                            <input type="text" name="user_name" class="form-control"
                                placeholder="Nhập Email để lấy lại mật khẩu">
                        </div>
                    </div>
                    <div class="princess_component--buttonregister">
                        <button type="submit" class="btn btn-success login" name="submit">Lấy lại mật khẩu</button>
                    </div>
                </form>
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

</body>

</html>