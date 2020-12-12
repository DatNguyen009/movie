<?php 
if (isset($_SESSION['loginsuccess']) && $_SESSION['loginsuccess'] == true) {
} else {
    header('location:/DAT/Skincare/Skincare/Login/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
                        <i class="fa fa-cart-plus" style="color:#ef8698;"></i> <span class="badge badge-light"
                            style="color:#ef8698;">
                            <?php echo $data['total_items'];?></span>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <main>

        <div class="cart__item">

            <div class="cart__card">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i> Giỏ hàng
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center" style="font-size: 14px;">
                                        <th>STT</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Màu</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Khuyến mãi</th>
                                        <th>Tổng tiền</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                </thead>

                                <?php $count = 1; while($row = mysqli_fetch_array($data['cart'])): ?>
                                <tbody id="prod_<?php echo $row['prod_id'];?>">
                                    <tr class="text-center" style="font-size: 12px;">
                                        <td><?php  echo $count++; ?></td>
                                        <td><?php echo $row['prod_name']; ?></td>
                                        <td style="max-width:140px;"> <img style="width:100px;"
                                                src="/DAT/Skincare/<?php if($row['typetable'] == 'princess'){echo 'upload';}else{echo 'upload_worker';} ?>/<?php echo $row['prod_img']; ?>"
                                                alt=""></td>
                                        <td><?php  echo $row['Color']; ?></td>
                                        <td><?php echo number_format($row['prod_cost']); ?>đ</td>
                                        <td>

                                            <input class="amount" id="<?php echo $row['prod_id']; ?>" type="text"
                                                value="<?php echo $row['amount']; ?>">

                                        </td>
                                        <td><?php echo number_format($row['prod_saleoff']); ?>%</td>
                                        <td>
                                            <p><?php echo number_format(($row['prod_cost']*$row['amount'])-(($row['prod_cost']*$row['amount'])*($row['prod_saleoff']/100))) .' đ'; ?>
                                            </p>
                                        </td>
                                        <td><button type="button" style="font-size: 9px;" class="btn btn-success"
                                                onclick="Buy_one(<?php echo $row['prod_id']; ?>,<?php echo $row['amount']; ?>,'<?php  echo $row['Color']; ?>','<?php if($row['typetable'] == 'worker'){echo 'prodid';}else{echo 'id';} ?>')">Mua</button><button
                                                style="font-size: 9px;" type="button" class="btn btn-danger"
                                                onclick="Del_Cart(<?php echo $row['prod_id']; ?>,'<?php if (isset($_SESSION['FB_ID'])) {echo $_SESSION['FB_ID'];}  ?>','<?php echo $row['typetable']; ?>')">Xóa</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endwhile;?>

                            </table>
                            <p style="display:none;">*Vuốt sang bên phải để xem chi tiết hơn</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="cart__order">
                <h4 style="padding: 15px;">Tóm tắt đơn hàng</h4>
                <div class="cart__order--infor" style="padding: 15px;">

                    <p>Số lượng: <?php echo number_format($data['total_items']); ?></p>
                    <p>Tổng tiền: <?php echo number_format($data['total_cost']).' đ'; ?></p>
                </div>
                <?php if($data['total_items'] != 0): ?>
                <button type="button" class="btn btn-success" style="margin-left: 15px;"
                    onclick="Buy_All('<?php echo number_format($data['total_cost']).' đ'; ?>')">Mua</button>
                <?php endif; ?>

            </div>
        </div>

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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                <i class="fas fa-table mr-1"></i>Thông tin chi tiết đơn hàng của bạn
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center" style="font-size: 14px;">
                                <th>STT</th>
                                <th>Tên khách</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày mua</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1; while($row = mysqli_fetch_array($data['Order_detail'])): ?>
                            <tr class="text-center" style="font-size: 12px;">
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['Buyer']; ?></td>
                                <td style="max-width:140px;"><?php echo $row['Address']; ?></td>
                                <td><?php echo $row['SDT']; ?></td>
                                <td><?php echo number_format($row['Total_cost']).' đ'; ?></td>
                                <td><?php echo $row['Pack']; ?> </td>
                                <td style="max-width:120px;"><?php echo $row['date']; ?></td>
                                <td><button type="button" style="font-size: 10px;" class="btn btn-info"
                                        onclick="Watch_Detail(<?php echo $row['order_id']; ?>,'<?php if (isset($_SESSION['FB_ID'])) {echo $_SESSION['FB_ID'];}  ?>','<?php echo $row['Color']; ?>','<?php echo $row['typetable']; ?>','<?php echo $row['Buyer']; ?>')"
                                        data-toggle="modal" data-target="#xem">Xem</button>
                                    <?php if(($row['Pack'] !== "Đã giao hàng" ) && ($row['Pack'] !== "Giao hàng thành công")): ?>
                                    <button type="button" style="font-size: 10px;" class="btn btn-danger"
                                        onclick="Del_order(<?php echo $row['order_id']; ?>,'<?php echo $row['Buyer']; ?>','<?php echo $row['SDT']; ?>','<?php if (isset($_SESSION['FB_ID'])) {echo $_SESSION['FB_ID'];}  ?>','<?php echo $row['typetable']; ?>')">Hủy</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile;?>

                        </tbody>
                    </table>
                    <p style="display:none;">*Vuốt sang bên phải để xem chi tiết hơn</p>
                </div>
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
                    <img id = "footer__worker--home" style="width: 40px; padding-top:20px; margin-left: 15px;"
                        src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
                </div>

            </div>
        </div>
        <div class="created text-center">
            <p>@Created Đạt Nguyễn</p>
        </div>
    </footer>
    <script src="/DAT/Skincare/MVC/views/js/Del_cart.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/Buy.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/Action_order.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function Plus(amount, id, cost) {
        $('#' + id).val(parseInt($('#' + id).val()) + 1);
        $('#cost_' + id).val((parseInt($('#' + id).val())) * cost);
    }

    function Minus(amount, id, cost) {
        $('#' + id).val(parseInt($('#' + id).val()) - 1);
        $('#cost_' + id).val((parseInt($('#' + id).val())) * cost);
        if ($('#' + id).val() == 0) {
            $('#' + id).val(1);
            $('#cost_' + id).val((parseInt($('#' + id).val()) + 0) * cost);
        }
    }
    </script>

    <script>
    // function getCookie(cname) {
    //     var name = cname + "=";
    //     var ca = document.cookie.split(';');
    //     for (var i = 0; i < ca.length; i++) {
    //         var c = ca[i];
    //         while (c.charAt(0) == ' ') {
    //             c = c.substring(1);
    //         }
    //         if (c.indexOf(name) == 0) {
    //             return c.substring(name.length, c.length);
    //         }
    //     }
    //     return "";
    // }

    // function checkCookie() {
    //     var user = getCookie("name");
    //     console.log(user);
    //     if (user != "") {

    //     } else {
    //         console.log("khong co");
    //     }
    // }
    </script>
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