
<?php

class Customer{
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

    public function __construct($db){
        $this->conn=$db;
        // var_dump($this->conn);
    }
    public function read(){

    }
    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getList(){
        $stmt= $this->conn->prepare("select custID, custName from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function setValue($custName,$custAddress,$custNIC,$custDOB,$email,$gender,$policyID,$custContact){
        $this->custName= $custName;
        $this->custAddress =  $custAddress;
        $this->custNIC= $custNIC;
        $this->custDOB= $custDOB;
        $this->email= !empty($email) ? $email : null;
        $this->gender= $gender;
        $this->policyID=$policyID;
        $this->custContact= explode(',',$custContact);
    }
    public function create(){
        function password_generate($chars){
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($data), 0, $chars);
        }

        $stmt= $this->conn->prepare("insert into $this->table (custName,password,custAddress,custNIC,custDOB,email,gender,policyID) 
                                                            values (:custName, :password, :custAddress, :custNIC, :custDOB, :email, :gender, :policyID) ");
        $stmt -> bindParam(':custName', $this->custName );
        $stmt -> bindParam(':password', password_generate(3) );
        $stmt -> bindParam(':custAddress', $this->custAddress );
        $stmt -> bindParam(':custNIC', $this->custNIC );
        $stmt -> bindParam(':custDOB', $this->custDOB );
        $stmt -> bindParam(':email', $this->email );
        $stmt -> bindParam(':gender', $this->gender );
        $stmt -> bindParam(':policyID', $this->policyID );
        $stmt->execute();
        $last_id = $this->conn->lastInsertId();
        foreach($this->custContact as $number){
            $stmt1= $this->conn->prepare("insert into customer_contact (custID,custContactNo) 
                                                            values (:custID, :custContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt1 -> bindParam(':custID', $last_id );
            $stmt1 -> bindParam(':custContactNo', $n);
            $stmt1->execute();
        }

    }
}
?>