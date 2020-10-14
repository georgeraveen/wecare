<?php

class NewInsureCase extends Controller{

    public function index(){
        $this->model('customer');
        $customerMod= new Customer();
        $custList=$customerMod->getList();

        $this->model('hospital');
        $hospitalMod= new Hospital();
        $hospList=$hospitalMod->getAll();

        $this->model('employee');
        $empMod= new Employee();
        $medList=$empMod->getEmpByTypeList("MED");

        $fagList=$empMod->getEmpByTypeList("FAG");
        // var_dump($hospList);

        include './../app/header.php';
        $this->view('dataEntry/newInsureCase',['custList'=>$custList,'hospList'=>$hospList,'medList'=>$medList,'fagList'=>$fagList]);
        include './../app/footer.php';
        // echo "asas";
    }

}