<?php 
    class AdminWorker extends Controller{
        function Manager(){
            $AD  = $this->model("DBmovie");
            $this->view("AdminManager_Worker",[
                "total_order"=>$AD->combine_total_order_worker(),
                "total_order_Pack"=>$AD->combine_total_order_workerPack(),
                "total_order_Success"=>$AD->combine_total_order_workerSuccess(),
                "january"=>$AD->january_worker(),
                "February"=>$AD->February_worker(),
                "March"=>$AD->March_worker(),
                "April"=>$AD->April_worker(),
                "May"=>$AD->May_worker(),
                "june"=>$AD->june_worker(),
                "july"=>$AD->july_worker(),
                "august"=>$AD->august_worker(),
                "september"=>$AD->september_worker(),
                "octember"=>$AD->octember_worker(),
                "november"=>$AD->november_worker(),
                "december"=>$AD->december_worker(),
            ]);
        }
        function Addproduct(){
            $this->view("AddProduct_Worker");
        }
        function ProductManager()
        {
            $PM  = $this->model("DBmovie");
            $this->view("ProductManager_Worker",[
                "Prod__Manager" => $PM->Prod_Manager(),
                "total_product"=>$PM->total_product_worker(),
            ]);
        }
        function Login(){
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Login");
        }
        function GeneralManager() {
            $AD  = $this->model("DBmovie");
            $this->view("Manager_General",[
                "total_order"=>$AD->combine_total_order_worker(),
                "total_order_Pack"=>$AD->combine_total_order_workerPack(),
                "total_order_Success"=>$AD->combine_total_order_workerSuccess(),
            ]);
        }
        
        function ManagerPack() {
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Manager_Pack_worker",[
                "total_order"=>$AD->combine_total_order_worker(),
                "total_order_Pack"=>$AD->combine_total_order_workerPack(),
                "total_order_Success"=>$AD->combine_total_order_workerSuccess(),
            ]);
        }
        function ManagerSuccess() {
            $AD  = $this->model("DBmovie");
            $this->view("Admin_Manager_workerSuccess",[
                "total_order"=>$AD->combine_total_order_worker(),
                "total_order_Pack"=>$AD->combine_total_order_workerPack(),
                "total_order_Success"=>$AD->combine_total_order_workerSuccess(),
            ]);
        }
    }
?>

