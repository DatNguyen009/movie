<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/Skincare.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/style_modal.css">
    <link rel="stylesheet" href="/DAT/Skincare/Public/assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=593044734629789&autoLogAppEvents=1"
        nonce="oZrkZtJK"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=768220467315915&autoLogAppEvents=1" nonce="6kYdMBSC"></script>
</head>

<body>
    <?php include_once "cursor.php"; ?>
    <div id="myModal" class="modal">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>
    <header>
        <div class="menu"
            style="background-image: url('<?php if(isset($_GET['id'])){echo '/DAT/Skincare/Public/Image/Dam May 2 màu.png';}else{echo '/DAT/Skincare/Public/Image/Hồng - Xanh.png';}?>');  background-position: center;">
            <div class="logo">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png"
                        alt="logo"></a>
            </div>
            <div class="logo__worker">
                <a href="/DAT/Skincare/Skincare/Home/"><img src="/DAT/Skincare/Public/Image/worker.png" alt="logo"></a>
            </div>
            <div class="menu_list_SP">
                <p id="menu_list_SP--princess" style="  color:<?php  if(isset($_GET['id'])){echo ' #458db0';}else{echo '#f09797';} ?>;">Princess</p>
                <p id="menu_list_SP--worker" style="  color:<?php  if(isset($_GET['id'])){echo ' #458db0';}else{echo '#f09797';} ?>;">Dai ty Makeup</p>
            </div>
           
            <form action="/DAT/Skincare/MVC/models/search.php" method="get">
                <div class="menu__search">

                    <form class="form-inline md-form form-sm">
                        <input class="form-control form-control-sm mr-3 w-75" name="search" type="text"
                            placeholder="Search" aria-label="Search"
                            style="background-image: linear-gradient(<?php  if(isset($_GET['id'])){echo '90deg, #92e1e9, #dfafb9';}else{echo '90deg, #dfafb9 ,#92e1e9';} ?>); border: none;">
                        <button style="border: none; background-color: #00000000;color:#dc5e60;" type="submit"
                            name="submitsearch"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </form>

                </div>
            </form>
            <?php if(isset($_SESSION['FB_NAME'])): ?>
            <div class="login_register">
                <a href="" style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>; border: 2px solid <?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;"><?php echo $_SESSION['FB_NAME']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php" style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>; border: 2px solid <?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;">Đăng
                    Xuất</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/MVC/models/logout.php"><i style="  color: #f76060;" class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="" style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>; border: 2px solid <?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;"><?php echo $_SESSION['name']; ?></a>
                <a href="/DAT/Skincare/MVC/models/logout.php" style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>; border: 2px solid <?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;">Đăng
                    Xuất</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/MVC/models/logout.php"><i style="  color: #f76060;" class="fas fa-sign-out-alt"></i></a>
            </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION['FB_NAME']) && !isset($_SESSION['name'])): ?>
            <div class="login_register">
                <a href="/DAT/Skincare/Skincare/Login/" style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>; border: 2px solid <?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;">Đăng
                    nhập</a>
                <a href="/DAT/Skincare/Skincare/Register/" style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>; border: 2px solid <?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;">Đăng
                    ký</a>
            </div>
            <div class="login_register__mobie" style="display: none;">
                <a href="/DAT/Skincare/Skincare/Login/"><i style="  color: #f76060;"
                        class="fas fa-location-arrow"></i></a>
                        <a href="/DAT/Skincare/Skincare/Register/"><i style="  color: #f76060;" class="far fa-registered"></i></i></a>
            </div>
            <?php endif; ?>
            <div class="cart">
                <a href="/DAT/Skincare/Skincare/Cart/">
                    <button type="button" class="btn btn-light">
                        <i class="fa fa-cart-plus"   style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;"></i> <span class="badge badge-light"
                        style="  color:<?php  if(isset($_GET['id'])){echo ' #f09797';}else{echo '#458db0';} ?>;">
                            <?php echo $data['total_items'];?></span>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <?php if($data['checkid_product'] != 0): ?>
    <section>
        <div class="product">
            <?php while($row = mysqli_fetch_array($data['Prod_Detail'])): ?>
            <div class="product__image">
                <div class="product_image--main">
                    <img src="/DAT/Skincare/<?php if(isset($_GET['id'])){echo 'upload'; }else{echo 'upload_worker';} ?>/<?php echo $row['prod_img']; ?>"
                        alt="<?php echo $row['prod_img']; ?>">
                </div>
                <div class="product_image--secondary">

                </div>
            </div>
            <div class="product__infor">
                <div class="product__infor--name">
                    <h1><?php echo $row['prod_name']; ?></h1>
                </div>
                <div class="product__infor--cost">
                    <?php echo number_format($row['prod_cost']); ?> đ
                </div>
                <div class="product__infor--discount">
                    Giảm giá: <?php echo $row['prod_saleoff']; ?>
                </div>
                <div class="product__infor--color">
                    <p>Màu</p>
                    <div class="color">
                        <!-- Default inline 1-->
                        <?php $color = explode(",",$row['Color']); for ($i=0; $i < count($color); $i++):?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="<?php echo $color[$i]; ?>"
                                name="radiocolor" value="<?php echo $color[$i]; ?>"
                                <?php if($i == 0) echo "checked"; ?>>
                            <label class="custom-control-label"
                                for="<?php echo $color[$i]; ?>"><?php echo $color[$i]; ?></label>
                        </div>
                        <?php endfor; ?>
                        <!-- Default inline 2-->
                        <!-- <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="pink"
                                name="radiocolor" value ="pink">
                            <label class="custom-control-label" for="pink">pink</label>
                        </div> -->

                        <!-- Default inline 3-->
                        <!-- <div class="custom-control custom-radio custom-control-inline">    
                            <input type="radio" class="custom-control-input" id="orange"
                                name="radiocolor"value ="orange">
                            <label class="custom-control-label" for="orange">orange</label>
                        </div> -->
                    </div>
                </div>
                <div class="product__infor--quanlity">
                    <p style="min-width: max-content;padding-right: 20px;">Số lượng</p>
                    <select class="custom-select" id="quantity">
                        <?php $amount =$row['prod_amount'];  for ($i=1; $i <= $amount; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <!-- <i class="fa fa-minus"
                        onclick="Minus(<?php echo $row['amount']; ?>,<?php echo $row['prod_id']; ?>,<?php echo $row['prod_cost']; ?>);"></i>
                    <input class="amount" id="<?php echo $row['prod_id']; ?>" type="text"
                        value="1" style ="background-color:#69bfda ;">
                    <i class="fa fa-plus"
                        onclick="Plus(<?php echo $row['amount']; ?>,<?php echo $row['prod_id']; ?>,<?php echo $row['prod_cost']; ?>);"></i> -->
                </div>

                <div class="product__infor--press">
                    <div class="product__infor--buy">
                        <button class="buy" data-toggle="modal" data-target="#buynow"
                            onclick="Buy(<?php if (isset($_GET['id'])){echo $row['prod_id'];} else {echo $row['prod_id'];}?>,'<?php if(isset($_GET['id'])){echo 'id';}else{echo 'prodid';} ?>')">Buy
                            Now</button>
                    </div>
                    <div class="product__infor--addcart">
                        <button class="addcart"
                            onclick="Add_Cart(<?php if (isset($_GET['id'])){echo $row['prod_id'];} else {echo $row['prod_id'];}?>,'<?php if (isset($_GET['id'])){echo $row['prod_name'];;} else {echo $row['prod_name'];}?>','<?php if (isset($_SESSION['FB_ID'])) {echo $_SESSION['FB_ID'];}  ?>','<?php if(isset($_GET['id'])){echo 'id';}else{echo 'prodid';} ?>');">Add
                            Cart</button>
                    </div>
                </div>
            </div>
            <?php endwhile;?>


            <div class="product__album">
                <?php $count = 1; while($row = mysqli_fetch_array($data['multi_image'])): ?>
                <div class="product__album--items">
                    <img id="img_<?php echo $count;?>" class="myImg"
                        src="/DAT/Skincare/<?php if(isset($_GET['id'])){echo 'upload'; }else{echo 'upload_worker';} ?>/<?php echo $row['img_one']; ?>"
                        alt="<?php echo $row['img_one']; ?>" onclick="Modal_image('<?php echo 'img_'.$count++; ?>');">
                </div>
                <?php endwhile; ?>
            </div>

        </div>
        <div class="product__infor--description">
            <div class="product__infor--titel">
                <h4>Chi tiết sản phẩm</h4>
            </div>
            <?php while($row = mysqli_fetch_array($data['prod_desciption'])): ?>
            <div class="product__infor--content">
                <p><?php echo $row['prod_description']; ?></p>
            </div>
            <?php endwhile; ?>
        </div>

        <h5 class="comment__titel">COMMENTS</h5>
        <div class="comments">
            <div class="fb-background-color">
                <div class="fb-comments" data-href="https://skincare.freevar.com/Skincare/Product/<?php if(isset($_GET['id'])){echo '&id='.$_GET['id'];}else{echo '&prodid='.$_GET['prodid'];} ?>" data-numposts="5" data-width="1080" data-colorscheme="dark"></div>
            </div>
        </div>

    </section>
    <input type="hidden" id="getUrl" value="<?php if(isset($_GET['id'])){echo "id";}else{echo "prodid";} ?>">
    <?php endif; ?>
    <?php if($data['checkid_product'] == 0): ?>
    <p class="text-center" style="color: gray;padding-top:10%;height: 430px;">Không tìm thấy sản phẩm</p>
    <?php endif; ?>
    <footer>
        <div class="footer">
            <div class="footer__princess">
                <div class="footer__princess--logo">
                    <?php if(isset($_GET['id'])): ?>
                    <img src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png" alt="logo">
                    <?php endif; ?>
                    <?php if(isset($_GET['prodid'])): ?>
                    <img id="worker__left" style="width: 40px;margin-left: 60px;padding-top: 20px;"
                        src="/DAT/Skincare/Public/Image/worker.png" alt="logo">
                    <?php endif; ?>

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
                    <?php if(isset($_GET['id'])): ?>
                    <img id="princess" src="/DAT/Skincare/Public/Image/LOGO PRINCESS nền trắng.png" alt="logo">
                    <?php endif; ?>
                    <?php if(isset($_GET['prodid'])): ?>
                    <img id="worker" style="width: 40px;padding-top: 20px;" src="/DAT/Skincare/Public/Image/worker.png"
                        alt="logo">
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="created text-center">
            <p>@Created Đạt Nguyễn</p>
        </div>
    </footer>
    <script src="/DAT/Skincare/MVC/views/js/cursor.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/Add_cart.js"></script>
    <script src="/DAT/Skincare/MVC/views/js/Buy.js"></script>
    <script src="/DAT/Skincare/Public/Library/node_modules/tata-js/dist/tata.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    // Get the modal
    function Modal_image(id_image) {


        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        // var img = document.querySelector(".myImg");
        var modalImg = document.getElementById("img01");
        var scr_image = document.getElementById("" + id_image).src;
        modal.style.display = "block";
        modalImg.src = scr_image;


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
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