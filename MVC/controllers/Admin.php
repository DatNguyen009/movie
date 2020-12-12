<?php 
    class Admin extends Controller{
        function Manager(){
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Manager",[
                "total_order"=>$AD->combine_total_order(),
                "total_order_Pack"=>$AD->combine_total_orderPack(),
                "total_order_Success"=>$AD->combine_total_orderSuccess(),
                "january"=>$AD->january(),
                "February"=>$AD->February(),
                "March"=>$AD->March(),
                "April"=>$AD->April(),
                "May"=>$AD->May(),
                "june"=>$AD->june(),
                "july"=>$AD->july(),
                "august"=>$AD->august(),
                "september"=>$AD->september(),
                "octember"=>$AD->octember(),
                "november"=>$AD->november(),
                "december"=>$AD->december(),
            ]);
        }
        function Addproduct(){
            $this->view("Add_Product");
        }
        function ProductManager()
        {
            $PM  = $this->model("DBmovie");
            $this->view("Product_Manager",[
                "Prod__Manager" => $PM->Prod_Manager(), 
                "total_product"=>$PM->total_product(),
            ]);
        }
        function Login(){
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Login");
        }
        function GeneralManager() {
            $AD  = $this->model("DBmovie");
            $this->view("Manager_General");
        }

        function ManagerPack() {
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Manager_Pack",[
                "total_order"=>$AD->combine_total_order(),
                "total_order_Pack"=>$AD->combine_total_orderPack(),
                "total_order_Success"=>$AD->combine_total_orderSuccess(),
            ]);
        }

         function ManagerSuccess() {
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Manager_success",[
                "total_order"=>$AD->combine_total_order(),
                "total_order_Pack"=>$AD->combine_total_orderPack(),
                "total_order_Success"=>$AD->combine_total_orderSuccess(),
            ]);
        }
    }
?>