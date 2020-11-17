<?php
class medicalCondition extends Models{
    private $conn;
    private $table="customer";
    private $custID;
    private $custName;
    private $custAddress;
    private $custNIC;
    private $custDOB;
    private $email;
    private $gender;
    private $policyID;
    private $custContact;


    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }
  

}
?>