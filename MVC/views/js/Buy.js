function Buy_one(prod_id, amount, color, typetable) {
    location.href = "/DAT/Skincare/Skincare/BuyOne/&" + typetable + "=" + prod_id + "&amount=" + amount + "&color=" + color;
}

function Buy_All(total_cost) {
    var session_totalcost = sessionStorage.totalcost = total_cost;
    location.href = "/DAT/Skincare/Skincare/Delivery_Infor/&BuyAll";
}

function Buy(id, typetable) {
    var color = "radiocolor";
    var quantity = $("#quantity").val();
    var radioValue = $("input[name=" + color + "]:checked").val();
    var sessionStorage_name = sessionStorage.amount = quantity;
    location.href = "/DAT/Skincare/Skincare/Delivery_Infor/&" + typetable + "=" + id + "&amount=" + sessionStorage.amount + "&color=" + radioValue;
}