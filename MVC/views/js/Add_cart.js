function Add_Cart(prod_id, prod_name, fb_id, typeprod) {
    var color = "radiocolor";
    var quantity = $("#quantity").val();
    var radioValue = $("input[name=" + color + "]:checked").val();

    if (quantity == null || quantity < 0) {
        tata.error('Sản phẩm này đã hết hàng rồi?', prod_name);
        return false;
    }
    $.ajax({
        url: "/DAT/Skincare/MVC/models/Add_Film_GG.php/?" + typeprod + "=" + prod_id + "&quantity=" + quantity + "&color=" + radioValue,
        method: "GET",
        data: {
            prod_id: prod_id,
            amount: quantity,
            radioValue: radioValue,
            fb_id: fb_id,
        },
        success: function(response) {

            if (response == "0") {
                tata.error('Sản phẩm này đã thêm rồi?', prod_name);
            } else {
                if (response == "1") {
                    tata.success('Đã thêm vào giỏ hàng', prod_name);
                }
            }
            if (response == "login") {
                location.href = "/DAT/Skincare/Skincare/Login/";
            }

        }
    })
}