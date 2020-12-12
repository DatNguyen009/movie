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
        <div class="login_register__mobie" style="display: none;">
            <a href="/DAT/Skincare/MVC/models/logout.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['name'])): ?>
        <div class="login_register">
            <a
                href=""><?php  if(strlen($_SESSION['name']) <= 11)
                { echo $_SESSION['name'];} 
                else 
                { $str = $_SESSION['name']; echo $str[0] .$str[1].$str[2] .$str[3].$str[4] .$str[5].$str[6] .$str[7].$str[8] .$str[9].$str[10]."..."; } ?></a>
            <a href="/DAT/Skincare/MVC/models/logout.php">Đăng Xuất</a>
        </div>
        <div class="login_register__mobie" style="display: none;">
            <a href="/DAT/Skincare/MVC/models/logout.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <?php endif; ?>
        <?php if(!isset($_SESSION['FB_NAME']) && !isset($_SESSION['name'])): ?>
        <div class="login_register">
            <a href="/DAT/Skincare/Skincare/Login/">Đăng nhập</a>
            <a href="/DAT/Skincare/Skincare/Register/">Đăng ký</a>
        </div>
        <div class="login_register__mobie" style="display: none;">
            <a href="/DAT/Skincare/Skincare/Login/"><i class="fas fa-location-arrow"></i></a>
            <a href="/DAT/Skincare/Skincare/Register/"><i class="far fa-registered"></i></i></a>
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
    <div class="background_home">
        <img src="/DAT/Skincare/Public/Image/11-Backgorund.png" alt="background">
    </div>
</header>