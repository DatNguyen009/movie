<?php 
if (isset($_SESSION['loginsuccess_Worker']) && $_SESSION['loginsuccess_Worker'] == true) {
} else {
    header('location:/DAT/Skincare/Admin/Login/');
}

$con = mysqli_connect('localhost','root','','skincare');;
$select_row = "SELECT count(prod_id) as total FROM product";
$result = mysqli_query($con,$select_row);

$row = mysqli_fetch_assoc($result);
$total_row = $row['total'];
$limit = 5;

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

$data['list_product'] = mysqli_query($con, "SELECT * FROM products_worker LIMIT $start,$limit ") ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
</head>

<body>
    <?php include_once "cursor.php"; ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Manager</a>
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
                        <a class="nav-link" href="/DAT/Skincare/AdminWorker/Manager/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Đơn hàng
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/DAT/Skincare/AdminWorker/ProductManager/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lý sản phẩm
                        </a>
                        <a class="nav-link" href="/DAT/Skincare/AdminWorker/Addproduct/">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                            Thêm sản phẩm
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="#">
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
                    <h1 class="mt-4">Quản lý sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Tổng số sản phẩm
                                    <p><?php echo $data['total_product']; ?></p>
                                </div>

                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">------------------------</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">------------------------</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">------------------------</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                    <p>Tên sản phẩm</p>
                                    <div id="modal_name">

                                    </div>
                                    <p>Ảnh sản phẩm</p>
                                    <div id="modal_anh">

                                    </div>
                                    <p>Giá sản phẩm</p>
                                    <div id="modal_gia">

                                    </div>
                                    <p>Số lượng sản phẩm</p>
                                    <div id="modal_soluong">

                                    </div>
                                    <p>Khuyến mãi</p>
                                    <div id="modal_saleoff">

                                    </div>
                                    <p>Màu</p>
                                    <p style="color:red;font-size:13px;">(* thêm màu cách nhau bởi dấu ,)</p>
                                    <div id="modal_color">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" name="submit" value="" class="btn btn-outline-primary"
                                        onclick="Modal_Update(sessionStorage.id,sessionStorage.typetable)">Update</button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size:12px;">
                                            <th>STT</th>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Khuyến mãi</th>
                                            <th>Màu</th>
                                            <th>Số lượng</th>
                                            <th style="width: 110px!important;">Tùy chọn</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if($data['list_product'] == true): ?>
                                        <?php $count =1; while($row = mysqli_fetch_array($data['list_product'])): ?>
                                        <tr id="prod_<?php echo $row['prod_id']; ?>" style="font-size:13px;">

                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['prod_id']; ?></td>
                                            <td><?php echo $row['prod_name']; ?></td>
                                            <td style="max-width:140px;"><img style="width: 50%;"
                                                    src="/DAT/Skincare/upload_worker/<?php echo $row['prod_img']; ?>"
                                                    alt="<?php echo $row['prod_img']; ?>"> </td>
                                            <td><?php echo number_format( $row['prod_cost'])." đ"; ?></td>
                                            <td><?php echo $row['prod_saleoff']; ?>%</td>
                                            <td><?php echo $row['Color']; ?></td>
                                            <td><?php echo $row['prod_amount']; ?></td>
                                            <td><button style="font-size:10px" ; type="button" class="btn btn-warning"
                                                    onclick="Update(<?php echo $row['prod_id']; ?>,'worker')" data-toggle="modal"
                                                    data-target="#update">Sửa</button><button style="font-size:10px" ;
                                                    type="button" class="btn btn-danger"
                                                    onclick="Del_Product(<?php echo $row['prod_id']; ?>,'<?php echo $row['prod_img']; ?>','worker')">Xóa</button>
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
                                href="/DAT/Skincare/AdminWorker/ProductManager/&trang=<?php echo ($tranghientai-1); ?>">Prev</a>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $tongtrang; $i++){
                                if ($i == $tranghientai){
                                    echo '<a class="active" style = " background-color:pink; border-radius: 5px;">'.$i.'</a> ';
                                }
                                else{
                                    echo '<a href="/DAT/Skincare/AdminWorker/ProductManager/&trang='.$i.'">'.$i.'</a> ';
                                }
                            }
                            ?>
                            <?php if($tranghientai < $tongtrang && $tongtrang > 1): ?>
                            <a class="btn btn-light"
                                href="/DAT/Skincare/AdminWorker/ProductManager/&trang=<?php echo ($tranghientai+1); ?>">Next</a>
                            <?php endif; ?>

                        </div>
                        <div class="note" style="color:red;padding-left: 20px;line-height: 7px;font-size: 11px;">
                            <p>Lưu ý:</p>
                            <p>Nút sửa: để xem update sản phẩm</p>
                            <p>Nút xóa: để xóa sản phẩm</p>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Created Đạt Nguyễn</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script>
    function Del_Product(prod_id, prod_img, typetable) {
        alertify.confirm('Xóa sản phẩm', 'Bạn có chắc chắn muốn xóa sản phẩm này không?',
            function() {
                alertify.success('Xóa thành công');
                $.ajax({
                    url: "/DAT/Skincare/Del_product.php",
                    method: "POST",
                    data: {
                        prod_id: prod_id,
                        prod_img: prod_img,
                        typetable: typetable,
                    },
                    success: function(response) {
                      
                        if (response == "0") {
                            $("#prod_" + prod_id).css("display", "none");
                        }

                    }
                })
            },
            function() {
                alertify.error('Xóa không thành công')
            });
    }
    var mang = [];
    var modal_name = document.querySelector("#modal_name");
    var modal_anh = document.querySelector("#modal_anh");
    var modal_gia = document.querySelector("#modal_gia");
    var modal_soluong = document.querySelector("#modal_soluong");
    var modal_saleoff = document.querySelector("#modal_saleoff");
    var modal_color = document.querySelector("#modal_color");
    var text = "text";
    var class_input = "form-control";
    var update_name = "update_name";
    var update_gia = "update_gia";
    var update_soluong = "update_soluong";
    var update_saleoff = "update_saleoff";
    var update_color = "update_color";

    function Update(prod_id, typetable) {
        var id_session = sessionStorage.id = prod_id;
        var typetable_session = sessionStorage.typetable = typetable;

        $.ajax({
            url: "/DAT/Skincare/MVC/models/watch_detail.php/?ProductManager",
            method: "GET",
            data: {
                prod_id: prod_id,
                typetable: typetable,
            },
            success: function(response) {
               
                var str1 = "";
                var chuoi = str1.concat(response);
            
                modal_name.innerHTML = `<input id = "${update_name}"  name = "${update_name} " type="
                    ${text}" value = "${chuoi}" class = "
                    ${class_input}">`;
            }
        })
        $.ajax({
            url: "/DAT/Skincare/MVC/models/infor_product.php/?ProductManager",
            method: "GET",
            data: {
                prod_id: prod_id,
                typetable: typetable,
            },
            success: function(response) {
                var str1 = "";
                var chuoi = str1.concat(response);
                mang = chuoi.split(" ");
                modal_anh.innerHTML = `<img src="/DAT/Skincare/upload_worker/${mang[0]}">`;
                modal_gia.innerHTML = "<input id = " + update_gia + " name = " + update_gia + " type=" +
                    text + " value = " + mang[1] + " class = " +
                    class_input + ">";
                modal_soluong.innerHTML = "<input id = " + update_soluong + " name = " + update_soluong +
                    " type=" + text + " value = " + mang[2] + " class = " +
                    class_input + ">";
                modal_saleoff.innerHTML = "<input id = " + update_saleoff + " name = " + update_saleoff +
                    " type=" + text + " value = " + mang[3] + " class = " +
                    class_input + ">";;
                var modal_img = document.querySelector("#modal_anh img");
                modal_img.classList.add("modal_img--product");
            }
        });

        $.ajax({
            url: "/DAT/Skincare/MVC/models/update_modal_color.php/",
            method: "GET",
            data: {
                prod_id: prod_id,
                typetable: typetable,
            },
            success: function(response) {
                var str1 = "";
                var chuoi = str1.concat(response);
           
                modal_color.innerHTML = `<input id = "${update_color}" name = "${update_color}
                    " type="${text}" value = "${chuoi} " class = "
                    ${class_input} ">`;
            }
        })
    }

    function Modal_Update(id, typetable) {
        var name = document.querySelector("#update_name").value;
        var gia = document.querySelector("#update_gia").value;
        var soluong = document.querySelector("#update_soluong").value;
        var saleoff = document.querySelector("#update_saleoff").value;
        var color = document.querySelector("#update_color").value;

        alertify.confirm('Update sản phẩm', 'Bạn có chắc chắn muốn update sản phẩm?',
            function() {

                $.ajax({
                    url: "/DAT/Skincare/MVC/models/Update_product.php/",
                    method: "POST",
                    data: {
                        id: id,
                        name: name,
                        gia: gia,
                        soluong: soluong,
                        saleoff: saleoff,
                        color: color,
                        typetable: typetable,
                    },
                    success: function(response) {
                        if (response == "success") {
                            alertify.success('Update thành công');
                            setTimeout(reloal, 2000);

                            function reloal() {
                                location.reload();
                            }
                        } else {
                            alert('update that bai')
                        }
                    }
                })
            },
            function() {
                alertify.error('Update không thành công')
            });


    }
    </script>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
</body>

</html>