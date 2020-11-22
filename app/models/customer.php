
<?php

class Customer extends Models{
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
    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getList(){
        $stmt= $this->conn->prepare("select custID, custName from $this->table");
        // var_dump($this->conn);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPolicy($id){
        $stmt= $this->conn->prepare("select policyID from $this->table where custID = $id");
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
            $randPass=substr(str_shuffle($data), 0, $chars);
            return array($randPass,password_hash( $randPass, PASSWORD_DEFAULT, [ 'cost' => 11 ] ));
        }
        
 ////////////////////remove password once email done///////////////////
        $stmt= $this->conn->prepare("insert into $this->table (custName,password,hashPass,custAddress,custNIC,custDOB,email,gender,policyID) 
                                                            values (:custName, :password, :hashPassword, :custAddress, :custNIC, :custDOB, :email, :gender, :policyID) ");
        $stmt -> bindParam(':custName', $this->custName );
        $passDetails=password_generate(3);
        $stmt -> bindParam(':password',  $passDetails[0]);
        $stmt -> bindParam(':hashPassword',  $passDetails[1]);
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
        $email_string = 
                '<html>
                    <head>
                        <style>
                            body {
                                font-family: "Roboto Slab", serif;
                                padding-left: 4rem;
                                padding-right: 4rem;
                                }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <center>
                                <h1>Wecare Customer Portal Registration</h1>
                                <h4>Username: CUST'.$last_id.'</h4>
                                <h4>Password: '.$passDetails[0].'</h4>
                            </center>
                        </div>
                    </body>
                </html>
                ';

        sendEmail($this->email, $this->custName,$email_string,"Wecare Customer Portal Registration");

    }
    public function custFilterName($filter){
        $stmt= $this->conn->prepare("select custID, custName from $this->table where custName
                            like '%$filter%' ");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function custFilterID($filter){
        $stmt= $this->conn->prepare("select custID, custName from $this->table where custID
                            like '%$filter%' ");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCustByID($id){
        $stmt= $this->conn->prepare("select custName, custAddress from $this->table where custID=$id");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>