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
            url: "/DAT/Skincare/MVC/models/watch_detail.php",
            method: "POST",
            data: {
                order_id: order_id,
                fb_id: fb_id,
                typetable: typetable,
                buyer: buyer,

            },
            success: function(response) {
                console.log(response);
                var str1 = "";
                var chuoi = str1.concat(response);

                modal_name.innerHTML = chuoi;

            }
        })
        $.ajax({
            url: "/DAT/Skincare/MVC/models/infor_product.php",
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
                if (typetable == 'princess') {
                    modal_anh.innerHTML = "<img src=" + '/DAT/Skincare/upload/' + mang[0] + ">";
                } else {
                    modal_anh.innerHTML = "<img src=" + '/DAT/Skincare/upload_worker/' + mang[0] + ">";
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