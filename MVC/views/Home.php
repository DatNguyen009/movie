

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "cursor.php"; ?>
    <?php include_once "header.php"; ?>
    <section>
        <div class="main">

            <div class="princess">

                <div class="main__princess--titel">
                    <p>Princess</p>
                    <h5><a href="/DAT/Skincare/Skincare/AllProduct/">Xem tất cả</a></h5>
                </div>

                <div class="princess__row">

                    <div class="primcess__column">
                        <?php while($row = mysqli_fetch_array($data['List_Product'])): ?>
                        <div class="princess--flex">
                            <a href="/DAT/Skincare/Skincare/Product/&id=<?php echo $row['prod_id']; ?>"> <img
                                    src="/DAT/Skincare/upload/<?php echo $row['prod_img']; ?>" alt=""></a>
                            <p><?php echo $row['prod_name']; ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>

            <!-- worker -->
            <div class="worker">
                <div class="main__princess--titel">
                    <p>Dai Ty Makeup</p>
                    <h5 id  = "all__watch" ><a href="/DAT/Skincare/Skincare/APDTMakeup/">Xem tất
                            cả</a></h5>
                </div>

                <div class="princess__row">

                    <div class="primcess__column">
                        <?php while($row = mysqli_fetch_array($data['List_Product_worker'])): ?>
                        <div class="princess--flex">
                            <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>"> <img
                                    src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>" alt=""></a>
                            <p><?php echo $row['prod_name']; ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <footer>
        <div class="footer">
            <div class="footer__princess">
                <div class="footer__princess--logo">
                    <img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png" alt="logo">
                </div>
                <div class="footer__princess--socical">
                    <div class="footer__socical--facebook">
                        <a href="https://www.facebook.com/Princess-103877634748168"><i class="fab fa-facebook-f"></i></a>
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

                <div class="footer__DTMK--logo">
                    <img id = "footer__worker--home"  style="width: 40px; padding-top:20px; margin-left: 15px;"
                        src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
                </div>

            </div>
        </div>
        <div class="created text-center">
            <p>@Created Đạt Nguyễn</p>
        </div>
    </footer>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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