<?php
    $con = mysqli_connect('localhost','root','','skincare');
    $searh  = $_GET['search'];
    $qr = "SELECT *FROM products_worker WHERE CONCAT( `prod_name`) LIKE ('%" . $searh . "%') UNION  SELECT * FROM   `product`   WHERE CONCAT( `prod_name`) LIKE ('%" . $searh . "%')";
    $search =  mysqli_query($con, $qr);
    if (mysqli_num_rows($search) > 0) {
        
    }
    else {
        $Search_Null = "Không có kết quả tìm kiếm nào cả!!!";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
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
            <div class="logo__worker">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/worker.png" alt="logo"></a>
            </div>
            <div class="menu_list_SP">
                <p id="menu_list_SP--princess">Princess</p>
                <p id="menu_list_SP--worker">Dai Ty Makeup</p>
            </div>
            <div class="cart">
                <a href="/DAT/Skincare/Skincare/Cart/">
                    <button type="button" class="btn btn-light">
                        <i class="fa fa-cart-plus"></i> <span class="badge badge-light">
                            <?php echo $data['total_items'];?></span>
                    </button>
                </a>
            </div>
            <form action="/DAT/Skincare/MVC/models/search.php" method="get">
                <div class="menu__search">

                    <form class="form-inline md-form form-sm">
                        <input style="  cursor: none;" class="form-control form-control-sm mr-3 w-75" name="search"
                            type="text" placeholder="Search" aria-label="Search">
                        <button style="border: none; background-color: #00000000;color:pink;cursor: none;" type="submit"
                            name="submitsearch"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </form>

                </div>
            </form>
            <?php if(isset($_SESSION['FB_NAME'])): ?>
            <div class="login_register">
                <a href=""><?php echo $_SESSION['FB_NAME']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php">Đăng Xuất</a>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href=""><?php echo $_SESSION['name']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php">Đăng Xuất</a>
            </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION['FB_NAME']) && !isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="/DAT/Skincare/Skincare/Login/">Đăng nhập</a>
                <a href="/DAT/Skincare/Skincare/Register/">Đăng ký</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/Skincare/Login/"><i class="fas fa-location-arrow"></i></a>
                <a href="/DAT/Skincare/Skincare/Register/"><i class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <div class="cart">
                <a href="/DAT/Skincare/Skincare/Cart/">
                    <button type="button" class="btn btn-light">
                        <i class="fa fa-cart-plus" style="color:#ef8698;"></i> <span class="badge badge-light"
                            style="color:#ef8698;">
                            <?php echo $data['total_items'];?></span>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <main>
        <div class="AllProduct">
            <div class="Allproduct__listproduct">
                <div class="Allproduct__listproduct--titel">
                    <h5>Search</h5>
                </div>
                <div class="Allproduct__listproduct--product">
                    <div class="Allproduct__listproduct--items">
                        <?php while($row = mysqli_fetch_array($search)): ?>
                        <div class="Allproduct__listproduct--item">
                            <?php if($row['prod_type'] == 'makeup' || $row['prod_type'] == 'skincare'): ?>
                            <a href="/DAT/Skincare/Skincare/Product/&id=<?php echo $row['prod_id']; ?>"> <img
                                    src="/DAT/Skincare/upload/<?php echo $row['prod_img']; ?>" alt=""></a>
                            <p><?php echo $row['prod_name']; ?></p>
                            <?php else: ?>
                                <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>"> <img
                                    src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>" alt=""></a>
                            <p><?php echo $row['prod_name']; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php if (isset($Search_Null)): ?>
            <p style="margin: 9%;color:pink;"><?php echo $Search_Null; ?></p>
            <?php endif; ?>
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
                    <img style="width: 40px; padding-top:20px; margin-left: 15px;"
                        src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
                </div>

            </div>
        </div>
        <div class="created text-center">
            <p>@Created Đạt Nguyễn</p>
        </div>
    </footer>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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