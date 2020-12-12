<?php 
if ((isset($_SESSION['loginsuccess_login']) && $_SESSION['loginsuccess_login'] == true)||(isset($_SESSION['loginsuccess_Worker']) && $_SESSION['loginsuccess_Worker'] == true)) {
} else {
    header('location:/DAT/Skincare/Admin/Login/');
}
$con = mysqli_connect('localhost','root','','skincare');
// order email
$select_row = "SELECT count(order_id) as total FROM `orderemail_worker`";
$result = mysqli_query($con,$select_row);
$row = mysqli_fetch_assoc($result);
$total_row = $row['total'];


$select_row_email = "SELECT count(order_id) as total_email FROM `order_email`";
$result_email = mysqli_query($con,$select_row_email);
$row_email = mysqli_fetch_assoc($result_email);
$total_row_email = $row_email['total_email'];

$total_row_fb_email = $total_row + $total_row_email;

$limit = 4;

if (isset($_GET['trang'])) {
    $tranghientai = $_GET['trang'];
} else {
    $tranghientai = 1;
}
$tongtrang = ceil($total_row_fb_email/$limit);


if ($tranghientai > $tongtrang) {
    $tranghientai = $tongtrang;
} else {
    if ($tranghientai <1) {
        $tranghientai = 1;
    }
}

$start = ($tranghientai-1)*$limit;
$data['list_order'] = mysqli_query($con, "SELECT distinct AUnion.email from (SELECT `Buyer`,`date`,`email`,`Pack` from `order_email` UNION SELECT `Buyer`,`date`,`email`,`Pack` from `orderemail_worker`) as AUnion ");


// end order email

// start order fb
$select_row = "SELECT count(order_id) as total FROM `order`";
$result = mysqli_query($con,$select_row);
$row = mysqli_fetch_assoc($result);
$total_row = $row['total'];


$select_row_email = "SELECT count(order_id) as total_email FROM `orderfb_worker`";
$result_email = mysqli_query($con,$select_row_email);
$row_email = mysqli_fetch_assoc($result_email);
$total_row_email = $row_email['total_email'];

$total_row_fb_email = $total_row + $total_row_email;

$limit = 4;

if (isset($_GET['trang'])) {
    $tranghientai = $_GET['trang'];
} else {
    $tranghientai = 1;
}
$tongtrang = ceil($total_row_fb_email/$limit);

if ($tranghientai > $tongtrang) {
    $tranghientai = $tongtrang;
} else {
    if ($tranghientai <1) {
        $tranghientai = 1;
    }
}

$start = ($tranghientai-1)*$limit;
$data['list_order_fb'] = mysqli_query($con, "SELECT distinct AUnion.fb_id from (SELECT `Buyer`,`date`,`fb_id`,`Pack` from `order` UNION SELECT `Buyer`,`date`,`fb_id`,`Pack` from `orderfb_worker`) as AUnion");

// end order fb

if (isset($_GET["url"])) {
    $url  = explode("/", filter_var(trim($_GET["url"],"/")) ); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeneralManager</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/styles.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <style>
    .change_width {
        width: 135%;
    }

    .change_modal-dialog {
        margin: 2rem 10rem;
    }
    </style>
</head>

<body>
    <?php include_once "cursor.php"; ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/DAT/Skincare/MVC/models/logout_admin.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link"
                            href="<?php if($url[0] == 'Admin'){echo '/DAT/Skincare/Admin/Manager/';}else{echo '/DAT/Skincare/AdminWorker/Manager/';} ?> ">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Đơn hàng
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link"
                            href="<?php if($url[0] == 'Admin'){echo '/DAT/Skincare/Admin/ProductManager/';}else{echo '/DAT/Skincare/AdminWorker/ProductManager/';} ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lý sản phẩm
                        </a>
                        <a class="nav-link"
                            href="<?php if($url[0] == 'Admin'){echo '/DAT/Skincare/Admin/Addproduct/';}else{echo '/DAT/Skincare/AdminWorker/Addproduct/';} ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Thêm sản phẩm
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Đơn hàng chung</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng số đơn hàng đã đặt
                                    <p><?php ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Số đơn hàng chưa được giao</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Số đơn hàng giao thành công</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="xem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog change_modal-dialog" role="document">
                            <div class="modal-content change_width">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr class="text-center" style="font-size: 14px;width: max-content;">
                                                        <th style="width:15rem;">Tên khách hàng</th>
                                                        <th tyle="width:15rem;">Tên sản phẩm</th>
                                                        <th>Shop</th>
                                                        <th>Giá</th>
                                                        <th>Màu</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng tiền</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr id="modal_infor" class="text-center" style="font-size: 13px;">

                                                        <td id="modal_name">

                                                        </td>
                                                        <td id="modal_productname">

                                                        </td>
                                                        <td id="modal_anh" style="max-width:140px">

                                                        </td>
                                                        <td id="modal_gia" style="max-width:140px;">

                                                        </td>
                                                        <td id="modal_mau">

                                                        </td>
                                                        <td id="modal_soluong">

                                                        </td>
                                                        <td id="modal_tongtien" style="min-width: 92px;">

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Đơn hàng chung cho tai khoan Email
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>STT</th>
                                            <th>Địa chỉ Email</th>
                                            <th style="min-width: 169px;">Cập nhật</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php if($data['list_order'] == true): ?>

                                        <?php $count = 1; while($row = mysqli_fetch_array($data['list_order'])): ?>

                                        <?php
                                                $email = $row['email'];
                                                $query_email1 = mysqli_query($con, "SELECT COUNT(AUnion.email) as total from (SELECT `Buyer`,`date`,`email`,`Pack`,typetable from `order_email` UNION SELECT `Buyer`,`date`,`email`,`Pack`,typetable from `orderemail_worker`) as AUnion WHERE ((AUnion.email = '$email' AND AUnion.typetable = 'princess')  )");
                                                $count_email1 = mysqli_fetch_array($query_email1);
                                                $total_count_email1 = $count_email1['total'];
                                              
                                                $query_email = mysqli_query($con, "SELECT COUNT(AUnion.email) as total from (SELECT `Buyer`,`date`,`email`,`Pack`,typetable from `order_email` UNION SELECT `Buyer`,`date`,`email`,`Pack`,typetable from `orderemail_worker`) as AUnion WHERE ((AUnion.email = '$email' AND AUnion.typetable = 'worker')  )");
                                                $count_email = mysqli_fetch_array($query_email);
                                                $total_count_email = $count_email['total'];
                                            
                                            ?>
                                        <?php if($total_count_email > 0 && $total_count_email1 > 0): ?>
                                        <tr style="font-size: 12px;">

                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><button type="button" style="font-size: 10px;" class="btn btn-info"
                                                    onclick="Watch_Detail('<?php echo $row['email']; ?>')"
                                                    data-toggle="modal" data-target="#xem">Xem</button>
                                            </td>

                                        </tr>
                                        <?php endif; ?>
                                        <?php endwhile; ?>

                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination">

                            <?php if($tranghientai> 1 && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/Admin/GeneralManager/&trang=<?php echo ($tranghientai-1); ?>">Prev</a>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $tongtrang; $i++){
                                if ($i == $tranghientai){
                                    echo '<a class="active" style = " background-color:pink; border-radius: 5px;">'.$i.'</a> ';
                                }
                                else{
                                    echo '<a href="/DAT/Skincare/Admin/GeneralManager/&trang='.$i.'">'.$i.'</a> ';
                                }
                            }
                            ?>
                            <?php if($tranghientai < $tongtrang && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/Admin/GeneralManager/&trang=<?php echo ($tranghientai+1); ?>">Next</a>
                            <?php endif; ?>
                        </div>
                        <div class="note" style="color:red;padding-left: 20px;line-height: 7px;font-size: 11px;">
                            <p>Lưu ý:</p>
                            <p>Nút xem: để xem thông tin chi tiết đơn hàng</p>
                            <p>Nút giao: cập nhật đơn hàng thành công</p>
                            <p>Nút xong: cập nhật đơn hàng đóng gói xong</p>
                        </div>
                    </div>


                    <!-- ==================================ORDER FB===================================== -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Đơn hàng chung cho tai khoan FaceBook
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>STT</th>
                                            <th>Địa chỉ Facebook</th>
                                            <th style="min-width: 169px;">Cập nhật</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        <?php if($data['list_order_fb'] == true): ?>

                                        <?php $count = 1; while($row = mysqli_fetch_array($data['list_order_fb'])): ?>

                                        <?php
                                                $email = $row['fb_id'];
                                                $query_email1 = mysqli_query($con, "SELECT COUNT(AUnion.fb_id) as total from (SELECT `Buyer`,`date`,`fb_id`,`Pack`,typetable from `order` UNION SELECT `Buyer`,`date`,`fb_id`,`Pack`,typetable from `orderfb_worker`) as AUnion WHERE ((AUnion.fb_id = '$email' AND AUnion.typetable = 'princess')  )");
                                                $count_email1 = mysqli_fetch_array($query_email1);
                                                $total_count_email1 = $count_email1['total'];
                                              
                                                $query_email = mysqli_query($con, "SELECT COUNT(AUnion.fb_id) as total from (SELECT `Buyer`,`date`,`fb_id`,`Pack`,typetable from `order` UNION SELECT `Buyer`,`date`,`fb_id`,`Pack`,typetable from `orderfb_worker`) as AUnion WHERE ((AUnion.fb_id = '$email' AND AUnion.typetable = 'worker')  )");
                                                $count_email = mysqli_fetch_array($query_email);
                                                $total_count_email = $count_email['total'];
                                            
                                            ?>
                                        <?php if($total_count_email > 0 && $total_count_email1 > 0): ?>
                                        <tr style="font-size: 12px;">

                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['fb_id']; ?></td>
                                            <td><button type="button" style="font-size: 10px;" class="btn btn-info"
                                                    onclick="Watch_Detail_fb('<?php echo $row['fb_id']; ?>')"
                                                    data-toggle="modal" data-target="#xem">Xem</button>
                                            </td>

                                        </tr>
                                        <?php endif; ?>
                                        <?php endwhile; ?>

                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination">

                            <?php if($tranghientai> 1 && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/Admin/GeneralManager/&trang=<?php echo ($tranghientai-1); ?>">Prev</a>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $tongtrang; $i++){
                                if ($i == $tranghientai){
                                    echo '<a class="active" style = " background-color:pink; border-radius: 5px;">'.$i.'</a> ';
                                }
                                else{
                                    echo '<a href="/DAT/Skincare/Admin/GeneralManager/&trang='.$i.'">'.$i.'</a> ';
                                }
                            }
                            ?>
                            <?php if($tranghientai < $tongtrang && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/Admin/GeneralManager/&trang=<?php echo ($tranghientai+1); ?>">Next</a>
                            <?php endif; ?>
                        </div>
                        <div class="note" style="color:red;padding-left: 20px;line-height: 7px;font-size: 11px;">
                            <p>Lưu ý:</p>
                            <p>Nút xem: để xem thông tin chi tiết đơn hàng</p>
                            <p>Nút giao: cập nhật đơn hàng thành công</p>
                            <p>Nút xong: cập nhật đơn hàng đóng gói xong</p>
                        </div>
                    </div>

                </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="/DAT/Skincare/Public/Library/node_modules/tata-js/dist/tata.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>

    <script>
    var mang = [];
    var modal_name = document.querySelector("#modal_name");
    var modal_anh = document.querySelector("#modal_anh");
    var modal_gia = document.querySelector("#modal_gia");
    var modal_soluong = document.querySelector("#modal_soluong");
    var modal_tongtien = document.querySelector("#modal_tongtien");
    var modal_mau = document.querySelector("#modal_mau");
    var modal_infor = document.querySelector("#modal_infor");
    var modal_productname = document.querySelector("#modal_productname");

    function Watch_Detail(email) {
        if (typeof typeof(Storage) !== 'undefined') {
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?name",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {
                    // var obj  = JSON.parse(response);
                    var str = "";
                    var chuoi = str.concat(response);
                    var mang = chuoi.split(",");

                    function getname(name) {
                        return `
                            <p> ${name}</p>
                       `
                    }
                    modal_name.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?anh",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {
                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(img) {
                        return `  
                           <p>${img}</p>
                       `
                    }
                    modal_anh.innerHTML = `${mang.map(getname).join("")}`;
                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?piece",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {
                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(img) {
                        return `  
                           <p>${new Intl.NumberFormat('vi', { style: 'currency', currency: 'VND' }).format(img)}</p>
                       `
                    }
                    modal_gia.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?color",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(color) {
                        return `
                            <p> ${color}</p>
                       `
                    }
                    modal_mau.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?quantity",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(soluong) {
                        return `
                            <p> ${soluong}</p>
                       `
                    }
                    modal_soluong.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?totalpiece",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(tongtien) {
                        return `
                            <p> ${new Intl.NumberFormat('vi', { style: 'currency', currency: 'VND' }).format(tongtien)}</p>
                       `
                    }
                    modal_tongtien.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both.php/?prodname",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(",");
                    console.log(mang);

                    function getname(nameproduct) {
                        return `
                            <p> ${nameproduct}</p>
                       `
                    }
                    modal_productname.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
        }

    }





    //fb
    function Watch_Detail_fb(email) {
        if (typeof typeof(Storage) !== 'undefined') {
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?name",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {
                    // var obj  = JSON.parse(response);
                    var str = "";
                    var chuoi = str.concat(response);
                    var mang = chuoi.split(",");

                    function getname(name) {
                        return `
                            <p> ${name}</p>
                       `
                    }
                    modal_name.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?anh",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {
                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(img) {
                        return `  
                           <p>${img}</p>
                       `
                    }
                    modal_anh.innerHTML = `${mang.map(getname).join("")}`;
                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?piece",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {
                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(img) {
                        return `  
                           <p>${new Intl.NumberFormat('vi', { style: 'currency', currency: 'VND' }).format(img)}</p>
                       `
                    }
                    modal_gia.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?color",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(color) {
                        return `
                            <p> ${color}</p>
                       `
                    }
                    modal_mau.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?quantity",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(soluong) {
                        return `
                            <p> ${soluong}</p>
                       `
                    }
                    modal_soluong.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?totalpiece",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(" ");

                    function getname(tongtien) {
                        return `
                            <p> ${new Intl.NumberFormat('vi', { style: 'currency', currency: 'VND' }).format(tongtien)}</p>
                       `
                    }
                    modal_tongtien.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_both_fb.php/?prodname",
                method: "GET",
                data: {

                    email: email,

                },
                success: function(response) {

                    var str = "";
                    var chuoi = str.concat(response.trim());
                    var mang = chuoi.split(",");
                    console.log(mang);

                    function getname(nameproduct) {
                        return `
                            <p> ${nameproduct}</p>
                       `
                    }
                    modal_productname.innerHTML = `${mang.map(getname).join("")}`;

                }
            })
        }

    }
    </script>
</body>

</html>