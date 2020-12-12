function Del_Cart(prod_id, fb_id, typetable) {
    // var cart = $(".cart-card-1");

    alertify.confirm('Xóa sản phẩm', 'Xác nhận xóa sản phẩm khỏi giỏ hàng',
        function() {
            alertify.success('Xóa thành công');
            $.ajax({
                url: "/DAT/Skincare/MVC/models/Del_cart.php/?" + typetable + "=" + prod_id,
                method: "GET",
                data: {
                    prod_id: prod_id,
                    fb_id: fb_id,
                },
                success: function(response) {

                    if (response == "0") {
                        // $(".confirm_modal").css("display", "none");
                        $("#prod_" + prod_id).css("display", "none");
                        // location.reload();
                    }

                }
            })
        },
        function() {
            alertify.error('Xóa không thành công')
        });
}

function Del_order(order_id, buyer, sdt, fb_id, typetable) {
    alertify.confirm('Hủy đơn hàng', 'Xác nhận hủy đơn hàng',
        function() {
            alertify.success('Hủy thành công');
            $.ajax({
                url: "/DAT/Skincare/MVC/models/Cancel_order.php/",
                method: "POST",
                data: {
                    order_id: order_id,
                    buyer: buyer,
                    sdt: sdt,
                    fb_id: fb_id,
                    typetable: typetable,
                },
                success: function(response) {

                    if (response == "0") {
                        setTimeout(reloal, 2000);

                        function reloal() {
                            location.reload();
                        }
                    }

                }
            })
        },
        function() {
            alertify.error('Hủy không thành công')
        });
}