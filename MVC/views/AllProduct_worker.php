<?php 
$con = mysqli_connect('localhost','root','','skincare');;
$select_row = "SELECT count(prod_id) as total FROM products_worker WHERE prod_type = 'son'";
$result = mysqli_query($con,$select_row);

$row = mysqli_fetch_assoc($result);
$total_row = $row['total'];
$limit = 1;

if (isset($_GET['trang'])) {
    $tranghientai = $_GET['trang'];
} else {
    $tranghientai = 1;
}
$tongtrang = ceil($total_row/$limit);
if ($tranghientai > $tongtrang) {
    $tranghientai = $tongtrang;
} else {
    if ($tranghientai <1) {
        $tranghientai = 1;
    }
}
$start = ($tranghientai-1)*$limit;

$data['list_product'] = mysqli_query($con, "SELECT * FROM products_worker WHERE prod_type = 'eyeliner'") ;
if (isset($_GET["url"])) {
    $url  = explode("/", filter_var(trim($_GET["url"],"/")) ); 
}
?>


<?php
 include 'ProductWorker_Type.php';
 include 'PW_Type_blush.php';
 include 'PW_Type_makeup.php';
 include 'PW_Type_others.php';
 include 'PW_Type_son.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product Dai Ty Makeup</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "cursor.php"; ?>
    <header>
        <div class="menu"
            style="background-image: url('<?php if($url[1] == 'APDTMakeup'){echo '/DAT/Skincare/Public/Image/Hồng - Xanh.png';}?>');  background-position: center;">
            <div class="logo">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png"
                        alt="logo"></a>
            </div>
            <div class="logo__worker">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/worker.png" alt="logo"></a>
            </div>
            <div class="menu_list_SP">
                <p id="menu_list_SP--princess" style="color: #dc5e60;">Princess</p>
                <p id="menu_list_SP--worker" style="color: #dc5e60;">Dai ty Makeup</p>
            </div>
            <form action="/DAT/Skincare/MVC/models/search.php" method="get">
                <div class="menu__search">

                    <form class="form-inline md-form form-sm">
                        <input class="form-control form-control-sm mr-3 w-75" name="search" type="text"
                            placeholder="Search" aria-label="Search"
                            style="background-image: linear-gradient(90deg, #dfafb9 ,#92e1e9); border: none;">
                        <button style="border: none; background-color: #00000000;color:#dc5e60;" type="submit"
                            name="submitsearch"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </form>

                </div>
            </form>
            <?php if(isset($_SESSION['FB_NAME'])): ?>
            <div class="login_register">
                <a href="" style="  color: #458db0; border: 2px solid #f09797;"><?php echo $_SESSION['FB_NAME']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php" style="  color: #458db0; border: 2px solid #458db0;">Đăng
                    Xuất</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/MVC/models/logout.php"><i style="  color: #f76060;"
                        class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="" style="  color: #458db0; border: 2px solid #458db0;"><?php echo $_SESSION['name']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php" style="  color: #458db0; border: 2px solid #458db0;">Đăng
                    Xuất</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/MVC/models/logout.php"><i style="  color: #f76060;"
                        class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION['FB_NAME']) && !isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="/DAT/Skincare/Skincare/Login/" style="  color: #458db0; border: 2px solid #458db0;">Đăng
                    nhập</a>
                <a href="/DAT/Skincare/Skincare/Register/" style="  color: #458db0; border: 2px solid #458db0;">Đăng
                    ký</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/Skincare/Login/"><i style="  color: #f76060;"
                        class="fas fa-location-arrow"></i></a>
                <a href="/DAT/Skincare/Skincare/Register/"><i style="  color: #f76060;"
                        class="far fa-registered"></i></i></a>
            </div>
            <?php endif; ?>
            <div class="cart">
                <a href="/DAT/Skincare/Skincare/Cart/">
                    <button type="button" class="btn btn-light">
                        <i class="fa fa-cart-plus" style="color:#458db0;"></i> <span class="badge badge-light"
                            style="color:#458db0;">
                            <?php echo $data['total_items'];?></span>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <section>
        <div class="AllProduct">
            <div class="Allproduct__listproduct">
                <div class="Allproduct__listproduct--titel">
                    <h5>Dai Ty Makeup</h5>
                </div>
                <!-- start tabs -->
                <div class="tab__princess">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home" data-toggle="tab" href="#eyeliner"
                                role="tab" aria-controls="eyeliner" aria-selected="true">Chì kẻ mắt</a>
                            <a class="nav-item nav-link" id="nav-eyeshadow" data-toggle="tab" href="#eyeshadow"
                                role="tab" aria-controls="eyeshadow" aria-selected="false">Phấn mắt </a>
                            <a class="nav-item nav-link" id="nav-blush" data-toggle="tab" href="#blush" role="tab"
                                aria-controls="blush" aria-selected="false">Phấn má</a>

                            <a class="nav-item nav-link " id="nav-son" data-toggle="tab" href="#son" role="tab"
                                aria-controls="son" aria-selected="true">Son</a>
                            <a class="nav-item nav-link" id="nav-makeup" data-toggle="tab" href="#makeup" role="tab"
                                aria-controls="makeup" aria-selected="false">Dụng cụ trang điểm </a>
                            <a class="nav-item nav-link" id="nav-others" data-toggle="tab" href="#others" role="tab"
                                aria-controls="others" aria-selected="false">Khác</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="eyeliner" role="tabpanel" aria-labelledby="eyeliner">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="eyeshadow" role="tabpanel" aria-labelledby="eyeshadow">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_eat'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="blush" role="tabpanel" aria-labelledby="blush">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_blush'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="son" role="tabpanel" aria-labelledby="son">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_son'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="makeup" role="tabpanel" aria-labelledby="makeup">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_makeup'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_others'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&prodid=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end tabs  -->

                </div>

            </div>

    </section>

    <?php include_once "footer.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
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