<?php 
if ((isset($_SESSION['loginsuccess_login']) && $_SESSION['loginsuccess_login'] == true) ) {
} else {
    header('location:/DAT/Skincare/Admin/Login/');
}
$con = mysqli_connect('localhost','root','','skincare');

$select_row = "SELECT count(order_id) as total FROM `order`";
$result = mysqli_query($con,$select_row);
$row = mysqli_fetch_assoc($result);
$total_row = $row['total'];


$select_row_email = "SELECT count(order_id) as total_email FROM `order_email`";
$result_email = mysqli_query($con,$select_row_email);
$row_email = mysqli_fetch_assoc($result_email);
$total_row_email = $row_email['total_email'];

$total_row_fb_email = $total_row + $total_row_email;

$limit = 8;

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
$data['list_order'] = mysqli_query($con, "("."SELECT * FROM `order` WHERE Pack = 'Giao hàng thành công')  UNION (SELECT * FROM `order_email` WHERE  Pack = 'Giao hàng thành công') ORDER BY `date` DESC LIMIT $start,$limit");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/styles.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
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
                        <a class="nav-link" href="/DAT/Skincare/Admin/Manager/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Đơn hàng
                        </a>
                        <a class="nav-link" href="/DAT/Skincare/Admin/GeneralManager/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Đơn hàng chung
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/DAT/Skincare/Admin/ProductManager/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lý sản phẩm
                        </a>
                        <a class="nav-link" href="/DAT/Skincare/Admin/Addproduct/">
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
                    <h1 class="mt-4">Đơn hàng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng số đơn hàng đã đặt
                                    <p><?php echo $data['total_order'];?></p>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Số đơn hàng đã đóng gói
                                <p><?php echo $data['total_order_Pack'];?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/DAT/Skincare/Admin/ManagerPack">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Số đơn hàng giao thành công
                                <p><?php echo $data['total_order_Success'];?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/DAT/Skincare/Admin/ManagerSuccess/">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Số đơn hàng chưa được giao
                               
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white">
                                       
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="xem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
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
                                                        <th>Tên sản phẩm</th>
                                                        <th>Ảnh</th>
                                                        <th>Giá</th>
                                                        <th>Màu</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng tiền</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr class="text-center" style="font-size: 13px;">
                                                        <td id="modal_name">

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
                            <i class="fas fa-table mr-1"></i> Đơn hàng
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th>STT</th>
                                            <th>Tên khách</th>
                                            <th>Địa chỉ</th>
                                            <th>SĐT</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày mua</th>
                                            <th style="min-width: 169px;">Cập nhật</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if($data['list_order'] == true): ?>
                                        <?php $count = 1; while($row = mysqli_fetch_array($data['list_order'])): ?>
                                        <tr style="font-size: 12px;">

                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['Buyer']; ?></td>
                                            <td style="max-width:140px;"><?php echo $row['Address']; ?></td>
                                            <td><?php echo $row['SDT']; ?></td>
                                            <td><?php echo number_format($row['Total_cost']).' đ'; ?></td>
                                            <td><?php echo $row['Pack']; ?></td>
                                            <td style="max-width:120px;"><?php echo $row['date']; ?></td>
                                            <td><button type="button" style="font-size: 10px;" class="btn btn-info"
                                                    onclick="Watch_Detail(<?php echo $row['order_id']; ?>,'<?php echo $row['fb_id']; ?>','<?php echo $row['Color']; ?>','<?php echo $row['typetable']; ?>','<?php echo $row['Buyer']; ?>')"
                                                    data-toggle="modal" data-target="#xem">Xem</button><button
                                                    style="font-size: 10px;" type="button" class="btn btn-warning"
                                                    onclick="Status(<?php echo $row['order_id']; ?>,'<?php echo $row['Buyer']; ?>','<?php echo $row['SDT']; ?>','<?php echo $row['Pack']; ?>','<?php echo $row['fb_id']; ?>','<?php echo $row['soluong'] ?>','<?php echo $row['typetable']; ?>')">Giao</button>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination">

                            <?php if($tranghientai> 1 && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/Admin/Manager/&trang=<?php echo ($tranghientai-1); ?>">Prev</a>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $tongtrang; $i++){
                                if ($i == $tranghientai){
                                    echo '<a class="active" style = " background-color:pink; border-radius: 5px;">'.$i.'</a> ';
                                }
                                else{
                                    echo '<a href="/DAT/Skincare/Admin/Manager/&trang='.$i.'">'.$i.'</a> ';
                                }
                            }
                            ?>
                            <?php if($tranghientai < $tongtrang && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/Admin/Manager/&trang=<?php echo ($tranghientai+1); ?>">Next</a>
                            <?php endif; ?>
                        </div>
                        <div class="note" style="color:red;padding-left: 20px;line-height: 7px;font-size: 11px;">
                            <p>Lưu ý:</p>
                            <p>Nút xem: để xem thông tin chi tiết đơn hàng</p>
                            <p>Nút giao: cập nhật đơn hàng đã giao thành công</p>
                            <p>Nút xong: cập nhật đơn hàng đã đóng gói xong</p>
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
    <script src="/DAT/Skincare/Public/Library/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
    var mang = [];
    var modal_name = document.querySelector("#modal_name");
    var modal_anh = document.querySelector("#modal_anh");
    var modal_gia = document.querySelector("#modal_gia");
    var modal_soluong = document.querySelector("#modal_soluong");
    var modal_tongtien = document.querySelector("#modal_tongtien");
    var modal_mau = document.querySelector("#modal_mau");

    function Watch_Detail(order_id, fb_id, color, typetable, buyer) {
        if (typeof typeof(Storage) !== 'undefined') {
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_name_product.php",
                method: "POST",
                data: {
                    order_id: order_id,
                    fb_id: fb_id,
                    typetable: typetable,
                    buyer: buyer,
                },
                success: function(response) {
                    var str1 = "";
                    var chuoi = str1.concat(response);
                    modal_name.innerHTML = chuoi;
                }
            })
            $.ajax({
                url: "/DAT/Skincare/MVC/models/admin_infor_product.php",
                method: "POST",
                data: {
                    order_id: order_id,
                    fb_id: fb_id,
                    color: color,
                    typetable: typetable,
                    buyer: buyer,
                },
                success: function(response) {
                    var str1 = "";
                    var chuoi = str1.concat(response);
                    mang = chuoi.split(" ");
                    console.log(mang);
                    if (typetable == 'princess') {
                        modal_anh.innerHTML = `<img src="/DAT/Skincare/upload/${mang[0]}">`;
                    } else {
                        modal_anh.innerHTML = `<img src="/DAT/Skincare/upload_worker/${mang[0]}">`;
                    }
                    modal_gia.innerHTML = mang[1] + ' đ';
                    modal_soluong.innerHTML = mang[2];
                    modal_tongtien.innerHTML = mang[3] + ' đ';
                    modal_mau.innerHTML = mang[4];
                    var modal_img = document.querySelector("#modal_anh img");
                    modal_img.classList.add("modal_img");
                }
            });
        }

    }

    function Pack(order_id, buyer, sdt, Pack, fb_id, typetable) {
        alertify.confirm('Đóng gói sản phẩm', 'Bạn có chắc chắn sản phẩm này này đã đóng gói xong không?',
            function() {
                $.ajax({
                    url: "/DAT/Skincare/MVC/models/Pack.php",
                    method: "POST",
                    data: {
                        order_id: order_id,
                        buyer: buyer,
                        sdt: sdt,
                        Pack: Pack,
                        fb_id: fb_id,
                        typetable: typetable,
                    },
                    success: function(response) {
                        if (response == "1") {
                            alertify.success('Đóng gói thành công');
                            setTimeout(reloal, 2000);
                            function reloal() {
                                location.reload();
                            }
                        } else {
                            tata.error('Đơn hàng này đã đóng gói rồi.');
                        }
                    }
                })
            },
            function() {
                alertify.error('Đóng gói không thành công')
            });
    }

    function Status(order_id, buyer, sdt, status, fb_id, amount, typetable) {
        alertify.confirm('Giao sản phẩm', 'Bạn có chắc chắn sản phẩm này này đã giao thành công không?',
            function() {
                $.ajax({
                    url: "/DAT/Skincare/MVC/models/Status.php",
                    method: "POST",
                    data: {
                        order_id: order_id,
                        buyer: buyer,
                        sdt: sdt,
                        status: status,
                        fb_id: fb_id,
                        amount: amount,
                        typetable: typetable,
                    },
                    success: function(response) {
                        if (response == "1") {
                            alertify.success('Giao thành công');
                            setTimeout(reloal, 2000);
                            function reloal() {
                                location.reload();
                            }
                        } else {
                            if (response == "3") {
                                tata.error('Đơn hàng này đã giao thành công rồi nhé.');
                            } else {
                                tata.error('Đơn hàng này chưa được đóng gói.');
                            }
                        }
                    }
                })
            },
            function() {
                alertify.error('Giao không thành công')
            });
    }
    </script>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
</body>

</html>