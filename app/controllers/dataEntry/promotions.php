<?php

class Promotions extends Controller
{
    public function index()
    {
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->model('promotion');
        $promo = new Promotion();
        $result=$promo->getAll();
        $this->view('dataEntry/viewPromo',$result);
        include './../app/footer.php';
        // echo "asas";
    }
    public function addPromo()
    {
        $this->checkPermission("DEO");
        include './../app/header.php';
        $this->view('dataEntry/addPromo');
        include './../app/footer.php';
        // echo "asas";
    }
    public function addPromotion()
    {
        try {        
            $this->checkPermission("DEO");
            if ($_POST['promo']) {
                if(! is_dir("./../documents/promo")) {
                    mkdir("./../documents/promo");
                }
                $file_name = $_FILES['fileToUpload']['name'];
                $file_size =$_FILES['fileToUpload']['size'];
                $file_tmp =$_FILES['fileToUpload']['tmp_name'];
                $file_type=$_FILES['fileToUpload']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
                
                $extensions= array("jpeg","jpg","png");
                var_dump($_FILES);
                if(in_array($file_ext,$extensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }
                
                if($file_size > 2097152){
                    $errors[]='File size must be excately 2 MB';
                }
                
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"./../documents/promo/".$file_name);
                    echo "Success";
                }else{
                    print_r($errors);
                }
                var_dump($_POST);
                $this->model('promotion');
                $newPromo = new Promotion();
                $result= $newPromo->setValue($this->valValidate($_POST['type']), $this->valValidate($_POST['date']), $_FILES['fileToUpload']['name']);
                var_dump("A");
                $result= $newPromo->create();
                var_dump("A");
                $_SESSION["successMsg"]="Promotion added successfully";
                sleep(1);
                header("Location: ./index");
                exit;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when inserting values";
            header("Location: ./index");
            throw $th;
        }
    }
    public function deletePromo()
    {
        try {
            $this->checkPermission("DEO");
            if ($_GET['action']=="delPromo") {
                $this->model('promotion');
                $newPromo = new Promotion();
                $result= $newPromo->deletePromo($this->valValidate($_GET['id']));
                $_SESSION["successMsg"]="Promotion deleted successfully";
                sleep(1);
                header("Location: ./index") ;
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Error occured when deleting promotion";
            header("Location: ./index");
        }
        
    }
}
