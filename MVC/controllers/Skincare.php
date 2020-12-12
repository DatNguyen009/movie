<?php
class Skincare extends Controller
{
  function Home()
  {
    //goi model
    $Skincare = $this->model("DBmovie");
    $this->view("Home",[
      "List_Product" => $Skincare->List_Product(),
      "List_Product_worker" => $Skincare->List_Product_worker(),
      "total_items" =>$Skincare->total(),
    ]);
  }
  function Product()
  {
    //goi model
    $Skincare = $this->model("DBmovie");
    $this->view("Product",[
      "Prod_Detail" =>$Skincare->Prod_Detail(),
      "total_items" =>$Skincare->total(),
      "multi_image" =>$Skincare->Multi_image(),
      "prod_desciption" =>$Skincare->Prod_Desciption(),
      "checkid_product" =>$Skincare->checkid_product(),
    ]);
  }
  function Delivery_Infor()
  {
    //goi model
    $DI = $this->model("DBmovie");
    $this->view("Delivery_infor",[
      "total_items" =>$DI->total(),
      "Prod_Detail" =>$DI->Prod_Detail(),
      "Buyall" =>$DI->Buyall(),
     
    ]);
  }
  function Cart()
  {
    //goi model
    $cart = $this->model("DBmovie");
    $this->view("Cart",[
      "cart" =>$cart->Cart(),
      "total_items" =>$cart->total(),
      "total_cost" =>$cart->total_cost(),
      "Order_detail" =>$cart->Order_detail(),
    ]);
  }
  function AllProduct() {
    $allProduct = $this->model("DBmovie");
    $this->view("all_product",[
      "total_items" =>$allProduct->total(),
      "List_Product" => $allProduct->List_Product(),
    ]);
  }
  function APDTMakeup() {
    $allProduct = $this->model("DBmovie");
    $this->view("AllProduct_worker",[
      "total_items" =>$allProduct->total(),
      "List_Product" => $allProduct->List_Product(),
    ]);
  }
  function BuyOne() {
    $BUY_one = $this->model("DBmovie");
    $this->view("Buy_one",[
      "total_items" =>$BUY_one->total(),
      "Prod_Detail" =>$BUY_one->Prod_Detail(),
    ]);
  }
  function Login() {
    $this->view("login",[
      // "Prod_Detail" =>$Skincare->Prod_Detail(),
      // "total_items" =>$Skincare->total(),
    ]);
  }
  function Register() {
    $this->view("register",[
      // "Prod_Detail" =>$Skincare->Prod_Detail(),
      // "total_items" =>$Skincare->total(),
    ]);
  }
  function Search() {
    $search = $this->model("DBmovie");
    $this->view("search",[
      "total_items" =>$search->total(),
    ]);
  }
  function ResetPass() {
    $this->view("resetpassword",[
      // "Prod_Detail" =>$Skincare->Prod_Detail(),
      // "total_items" =>$Skincare->total(),
    ]);
  }
  function Thank() {
    $thank = $this->model("DBmovie");
    $this->view("Thankyou",[
      "total_items" =>$thank->total(),

    ]);
  }
}
