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
    <title>Delivery Information</title>
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
                        <i style="color:pink;" class="fa fa-cart-plus"></i> <span style="color:pink;"
                            class="badge badge-light">
                            <?php echo $data['total_items'];?></span>
                    </button>
                </a>
            </div>
        </div>

    </header>
    <main>
        <div class="Deliverly" style="display: flex; ">
            <div class="Delivery__Infor">
                <div class="Delivery__Infor--items">
                    <p>Nhập họ và tên</p>
                    <input id="name" type="text" name="name" class="form-control">
                    <span id="error_name" style="color: red;"></span>
                    <p>Nhập số điện thoại</p>
                    <input id="SDT" type="text" name="SDT" class="form-control">
                    <span id="error_SDT" style="color: red;"></span>
                    <p>Nhập địa chỉ giao hàng</p>
                    <textarea id="address" name="address" cols="61" rows="10"></textarea>
                    <br>
                    <span id="error_address" style="color: red;"></span>

                    <p style="color: red;    padding-top: 17px;">Lưu ý: (*) thông tin bắt buộc</p>

                </div>

            </div>

            <div class="Deliverly__product">

                <!-- now buy -->
                <?php if(!isset($_GET['BuyAll'])): ?>
                <?php while($row = mysqli_fetch_array($data['Prod_Detail'])): ?>
                <div class="Deliverly__product--name">
                    <p><?php echo $row['prod_name']; ?></p>
                </div>

                <div class="Deliverly__product--image">
                    <img src="/DAT/Skincare/<?php if(isset($_GET['id'])){echo 'upload'; }else{echo 'upload_worker';} ?>/<?php echo $row['prod_img']; ?>"
                        alt="<?php echo $row['prod_img']; ?>">
                </div>
                <div class="Deliverly__product--color">
                    <p>Màu: <?php echo $_GET['color'];?></p>
                </div>
                <div class="Deliverly__product--amount">
                    <p>Số lượng: <?php echo $_GET['amount'];?></p>
                </div>
                <div class="Deliverly__product--total">
                    <p>Tổng tiền:
                        <?php echo number_format(($row['prod_cost']*$_GET['amount'])-(($row['prod_cost']*$_GET['amount'])*($row['prod_saleoff']/100))) .' đ'; ?>
                    </p>
                </div>
                <button id="btn_deliverly" type="button" class="btn btn-success"
                    onclick="Buy(<?php echo $row['prod_id']; ?>,<?php echo $_GET['amount'];?>, '<?php echo ($row['prod_cost']*$_GET['amount'])-(($row['prod_cost']*$_GET['amount'])*($row['prod_saleoff']/100)); ?>','<?php echo $_GET['color'];?>','<?php if (isset($_SESSION['FB_ID'])) {echo $_SESSION['FB_ID'];}  ?>','<?php if(isset($_GET['id'])){echo 'id';}else{echo 'prodid';} ?>')">Thanh
                    toán</button>
                <?php endwhile; ?>
                <?php endif; ?>


                <!-- buy all -->

                <?php if(isset($_GET['BuyAll'])): ?>
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
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>

                        <?php $count =1; while($row = mysqli_fetch_array($data['Buyall'])): ?>
                        <tbody id="prod_<?php echo $row['prod_id'];?>">
                            <tr class="text-center" style="font-size: 12px;">
                                <td><?php  echo $count++; ?></td>
                                <td><?php echo $row['prod_name']; ?></td>
                                <td style="max-width:140px;"> <img style="width:100px;"
                                        src="/DAT/Skincare/<?php if($row['typetable'] == 'princess'){echo 'upload'; }else{echo 'upload_worker';} ?>/<?php echo $row['prod_img']; ?>"
                                        alt=""></td>
                                <td><?php  echo $row['Color']; ?></td>
                                <td><?php echo number_format($row['prod_cost']); ?>đ</td>
                                <td>

                                    <p><?php echo $row['amount']; ?></p>

                                </td>

                                <td>
                                    <p><?php echo number_format(($row['prod_cost']*$row['amount'])-(($row['prod_cost']*$row['amount'])*($row['prod_saleoff']/100))) .' đ'; ?>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                        <?php endwhile; ?>

                    </table>

                </div>
                <button id="btn_buyall" type="button" class="btn btn-success"
                    onclick="Buy_All('<?php if (isset($_SESSION['FB_ID'])) {echo $_SESSION['FB_ID'];}  ?>')">Thanh
                    toán</button>
                <?php endif; ?>

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
    <script src="/DAT/Skincare/Public/Library/node_modules/tata-js/dist/tata.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function Buy(prod_id, prod_amount, prod_cost, color, fb_id, typeprod) {
        var name = document.querySelector("#name").value;
        var SDT = document.querySelector("#SDT").value;
        var address = document.querySelector("#address").value;
        var error_name = document.querySelector("#error_name");
        var error_sdt = document.querySelector("#error_SDT");
        var error_address = document.querySelector("#error_address");
        document.cookie = "name=" + name + ";path=/DAT/Skincare/Skincare/Cart/";
        document.cookie = "SDT=" + SDT + ";path=/DAT/Skincare/Skincare/Cart/";
        if (name == "" && SDT == "" && address == "") {
            error_name.innerHTML = "Không được bỏ trống!!!";
            error_sdt.innerHTML = "Không được bỏ trống!!!";
            error_address.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_name.innerHTML = "";
            error_sdt.innerHTML = "";
            error_address.innerHTML = "";
        }

        if (name == "") {
            error_name.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_name.innerHTML = "";
        }
        if (SDT == "") {
            error_sdt.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_sdt.innerHTML = "";
        }
        if (address == "") {
            error_address.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_address.innerHTML = "";
        }
        $.ajax({
            url: "/DAT/Skincare/MVC/models/buy.php/",
            method: "POST",
            data: {
                prod_id: prod_id,
                prod_amount: prod_amount,
                prod_cost: prod_cost,
                name: name,
                SDT: SDT,
                address: address,
                color: color,
                fb_id: fb_id,
                typeprod: typeprod,
            },
            success: function(response) {
            
                if (response == "princess") {
                    location.href = "/DAT/Skincare/Skincare/Thank/";
                } else {
                    tata.success('Cảm ơn bạn ', 'Đã đặt hàng :)');
                    setTimeout(reloal, 2000);

                    function reloal() {
                        location.href = "/DAT/Skincare/Skincare/Home/";
                    }
                }

            }
        })
    }

    function Buy_All(fb_id) {
        var name = document.querySelector("#name").value;
        var SDT = document.querySelector("#SDT").value;
        var address = document.querySelector("#address").value;
        var error_name = document.querySelector("#error_name");
        var error_sdt = document.querySelector("#error_SDT");
        var error_address = document.querySelector("#error_address");
        if (name == "" && SDT == "" && address == "") {
            error_name.innerHTML = "Không được bỏ trống!!!";
            error_sdt.innerHTML = "Không được bỏ trống!!!";
            error_address.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_name.innerHTML = "";
            error_sdt.innerHTML = "";
            error_address.innerHTML = "";
        }

        if (name == "") {
            error_name.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_name.innerHTML = "";
        }
        if (SDT == "") {
            error_sdt.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_sdt.innerHTML = "";
        }
        if (address == "") {
            error_address.innerHTML = "Không được bỏ trống!!!";
            return false;
        } else {
            error_address.innerHTML = "";
        }
        $.ajax({
            url: "/DAT/Skincare/MVC/models/Buy_all.php/",
            method: "POST",
            data: {
                name: name,
                SDT: SDT,
                address: address,
                fb_id: fb_id,
            },
            success: function(response) {

                if (response == "cahai") {
                    tata.success('Cảm ơn bạn', ' Đã đặt hàng :)');
                    setTimeout(reloal, 2000);

                    function reloal() {
                        location.href = "/DAT/Skincare/Skincare/Home/";
                    }
                } else {
                    if (response == "princess") {
                        location.href = "/DAT/Skincare/Skincare/Thank/";
                    } else {
                        tata.success('Cảm ơn bạn', ' Đã đặt hàng :)');
                        setTimeout(reloal, 2000);

                        function reloal() {
                            location.href = "/DAT/Skincare/Skincare/Home/";
                        }
                    }
                }
            }
        })
    }
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