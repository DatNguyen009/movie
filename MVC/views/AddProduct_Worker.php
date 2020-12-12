<?php 
session_start();
if ((isset($_SESSION['loginsuccess_Worker']) && $_SESSION['loginsuccess_Worker'] == true)) {
} else {
    header('location:/DAT/Skincare/Admin/Login/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="/DAT/Skincare/Public/Library/vue.js"></script>

</head>

<body>

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
                    <h1 class="mt-4">Thêm sản phẩm</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                    </div>
                    <?php endif; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="/DAT/Skincare/formUpload_worker.php" method="post"
                                    enctype="multipart/form-data">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <div class="add_infor">
                                            <p>Mã sản phẩm</p>
                                            <input id="masp" type="text" name="masp" class="form-control" value="<?php if (isset($_SESSION['masp'])) {
                                                echo $_SESSION['masp']; 
                                            }  ?>">

                                            <p>Tên sản phẩm</p>
                                            <input id="tensp" type="text" name="tensp" class="form-control" value="<?php if (isset($_SESSION['tensp'])) {
                                                echo $_SESSION['tensp'];
                                            }  ?>">

                                            <p>Giá sản phẩm</p><span>(vd: 2000 đ chỉ cần nhập 2000)</span>
                                            <input id="giasp" type="text" name="giasp" class="form-control" value="<?php if (isset($_SESSION['gia'])) {
                                                echo $_SESSION['gia'];
                                            }  ?>">
                                            <p>Loại sản phẩm</p>
                                            <!-- Default inline 2-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="eyeliner"
                                                    name="radiocolor" value="eyeliner">
                                                <label class="custom-control-label" for="eyeliner">Chì kẻ mắt</label>
                                            </div>

                                            <!-- Default inline 3-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="eyeshadow"
                                                    name="radiocolor" value="eyeshadow">
                                                <label class="custom-control-label" for="eyeshadow">Phấn mắt</label>
                                            </div>
                                            <!-- Default inline 2-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="blush"
                                                    name="radiocolor" value="blush">
                                                <label class="custom-control-label" for="blush">Phấn má</label>
                                            </div>

                                            <!-- Default inline 3-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="son"
                                                    name="radiocolor" value="son">
                                                <label class="custom-control-label" for="son">Son</label>
                                            </div>
                                              <!-- Default inline 2-->
                                              <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="makeup1"
                                                    name="radiocolor" value="makeup1">
                                                <label class="custom-control-label" for="makeup1">Dụng cụ trang điểm</label>
                                            </div>

                                            <!-- Default inline 3-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input" id="others"
                                                    name="radiocolor" value="others">
                                                <label class="custom-control-label" for="others">Khác</label>
                                            </div>
                                            <p>Ảnh sản phẩm</p>
                                            <label for="fileSelect">Tên file:</label>
                                            <input type="file" name="photo[]" id="fileSelect" multiple>
                                            <p><strong>Ghi chú:</strong> Chỉ cho phép định dạng .jpg, .jpeg, .gif và
                                                kích
                                                thước tối đa tệp tin là 5MB.</p>
                                            <p>Màu</p><span class="noteinadd"
                                                style="position: absolute;color: red;font-size: 13px;transform: translateY(-20px);">(có
                                                thể chọn nhiều cách nhau bởi dấu ,)</span>
                                            <input id="color" type="text" name="color" class="form-control"
                                                placeholder="đỏ,hồng">
                                            <p>Khuyến mãi</p>
                                            <span class="noteinadd"
                                                style="position: absolute;color: red;font-size: 13px;transform: translateY(-20px);">(vd:
                                                0% chỉ cần nhập 0)</span>
                                            <input id="khuyenmai" type="number" min="0" max="100" name="khuyenmai"
                                                class="form-control" value="<?php if (isset($_SESSION['khuyenmai'])) {
                                                echo $_SESSION['khuyenmai'];
                                            }  ?>">
                                            <p>Miêu tả</p>
                                            <textarea id="mota" v-model="description" name="mieuta" cols="127" rows="5"
                                                value="<?php if (isset($_SESSION['mota'])) {
                                                echo $_SESSION['mota'];
                                            }  ?>"></textarea>
                                            <span style="white-space: pre-line;">{{ description }}</span>
                                            <br>
                                            <p>Số lượng sản phẩm thêm vào</p>
                                            <input id="soluong" type="number" name="soluong" min="0" max="100"
                                                class="form-control" value="<?php if (isset($_SESSION['soluong'])) {
                                                echo $_SESSION['soluong'];
                                            }  ?>">
                                        </div>

                                    </table>
                                    <button type="submit" name="submit" value="Upload file"
                                        class="btn btn-outline-primary">Thêm</button>
                                </form>
                                <div class="note" style="color:red;padding-top: 20px;line-height: 7px;font-size: 11px;">
                                    <p>Lưu ý:</p>
                                    <p>Những trường có dấu * là bắt buộc nhập</p>
                                </div>
                            </div>
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
    <script>
    new Vue({
        el: '.table-responsive',
        data: {
            description: '',
        }
    })
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>

</html>