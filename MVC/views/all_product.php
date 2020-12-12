<?php 
$con = mysqli_connect('localhost','root','','skincare');;
$select_row = "SELECT count(prod_id) as total FROM product WHERE prod_type = 'makeup'";
$result = mysqli_query($con,$select_row);

$row = mysqli_fetch_assoc($result);
$total_row = $row['total'];
$limit = 8;

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

$data['list_product_makeup'] = mysqli_query($con, "SELECT * FROM product WHERE prod_type = 'makeup' ") ;
if (isset($_GET["url"])) {
    $url  = explode("/", filter_var(trim($_GET["url"],"/")) ); 
}


?>

<?php
include 'Product_Type_skincare.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <?php include_once "cursor.php"; ?>
    <header>
        <div class="menu"
            style="background-image: url('<?php if($url[1] == 'AllProduct'){echo '/DAT/Skincare/Public/Image/Dam May 2 màu.png';}?>');  background-position: center;">
            <div class="logo">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png"
                        alt="logo"></a>
            </div>
            <div class="logo__worker">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/worker.png" alt="logo"></a>
            </div>
            <div class="menu_list_SP">
                <p id="menu_list_SP--princess" style="color: #458db0;">Princess</p>
                <p id="menu_list_SP--worker" style="color: #458db0;">Dai ty Makeup</p>
            </div>
            <form action="/DAT/Skincare/MVC/models/search.php" method="get">
                <div class="menu__search">

                    <form class="form-inline md-form form-sm">
                        <input class="form-control form-control-sm mr-3 w-75" name="search" type="text"
                            placeholder="Search" aria-label="Search"
                            style="background-image: linear-gradient(90deg, #92e1e9, #dfafb9); border: none;">
                        <button style="border: none; background-color: #00000000;color:#dc5e60;" type="submit"
                            name="submitsearch"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </form>

                </div>
            </form>
            <?php if(isset($_SESSION['FB_NAME'])): ?>
            <div class="login_register">
                <a href="" style="  color: #f09797; border: 2px solid #f09797;"><?php echo $_SESSION['FB_NAME']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php" style="  color: #f09797; border: 2px solid #f09797;">Đăng
                    Xuất</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/MVC/models/logout.php"><i style="  color: #f76060;"
                        class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="" style="  color: #f09797; border: 2px solid #f09797;"><?php echo $_SESSION['name']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php" style="  color: #f09797; border: 2px solid #f09797;">Đăng
                    Xuất</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/MVC/models/logout.php"><i style="  color: #f76060;"
                        class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION['FB_NAME']) && !isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="/DAT/Skincare/Skincare/Login/" style="  color: #f09797; border: 2px solid #f09797;">Đăng
                    nhập</a>
                <a href="/DAT/Skincare/Skincare/Register/" style="  color: #f09797; border: 2px solid #f09797;">Đăng
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
                        <i class="fa fa-cart-plus" style="color:#ef8698;"></i> <span class="badge badge-light"
                            style="color:#ef8698;">
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
                    <h5>Princess</h5>
                </div>
                <!-- start tabs -->
                <div class="tab__princess">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Makeup</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Skincare</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_makeup'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&id=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload/<?php echo $row['prod_img']; ?>" alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="Allproduct__listproduct--product">
                                <div class="Allproduct__listproduct--items">
                                    <?php while($row = mysqli_fetch_array($data['list_product_skincare'])): ?>
                                    <div class="Allproduct__listproduct--item">
                                        <a href="/DAT/Skincare/Skincare/Product/&id=<?php echo $row['prod_id']; ?>">
                                            <img src="/DAT/Skincare/upload/<?php echo $row['prod_img']; ?>"
                                                alt=""></a>
                                        <p><?php echo $row['prod_name']; ?></p>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    
                </div>


                <!-- end tabs -->

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