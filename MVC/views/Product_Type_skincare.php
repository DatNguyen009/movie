<?php 

$select_row = "SELECT count(prod_id) as total FROM product WHERE prod_type = 'skincare'";
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

$data['list_product_skincare'] = mysqli_query($con, "SELECT * FROM product WHERE prod_type = 'skincare'") ;
if (isset($_GET["url"])) {
    $url  = explode("/", filter_var(trim($_GET["url"],"/")) ); 
}


?>