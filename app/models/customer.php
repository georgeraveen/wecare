
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
    private $type;
    private $paymentDate;
    private $status;

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }
    public function startTrans(){
        $this->conn->beginTransaction();
    }
    public function transCommit(){
        $this->conn->commit();
    }
    public function transRollBack(){
        $this->conn->rollBack();
    }
    public function getAll(){
        $stmt= $this->conn->prepare("SELECT * from $this->table where status=1");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDetails($_id){
        $stmt= $this->conn->prepare("select * from $this->table where custID= $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getList(){
        $stmt= $this->conn->prepare("SELECT custID, custName from $this->table where status=1");
        // var_dump($this->conn);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getBasicCustList(){
        $stmt= $this->conn->prepare("SELECT i.custID as custID, i.custName custName, i.custNIC as custNIC, c.custContactNo as custContact from $this->table as i
                                    inner join customer_contact as c on i.custID=c.custID where i.status=1");
        // var_dump($this->conn);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPolicy($id){
        $stmt= $this->conn->prepare("SELECT policyID from $this->table where custID = $id AND status=1");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function setValue($custID,$custName,$custAddress,$custNIC,$custDOB,$email,$gender,$policyID,$custContact,$type,$paymentDate){
        $this->custID= $custID;
        $this->custName= $custName;
        $this->custAddress =  $custAddress;
        $this->custNIC= $custNIC;
        $this->custDOB= $custDOB;
        $this->email= !empty($email) ? $email : null;
        $this->gender= $gender;
        $this->policyID=$policyID;
        $this->custContact= explode(',',$custContact);
        $this->type=$type;
        $this->paymentDate=$paymentDate;
        $this->status="Active";
    }
    public function create(){
        
        ////////////////////remove password once email done///////////////////
        $stmt= $this->conn->prepare("INSERT into $this->table (custName,password,hashPass,custAddress,custNIC,custDOB,email,gender,policyID) 
                                                            values (:custName, :password, :hashPassword, :custAddress, :custNIC, :custDOB, :email, :gender, :policyID) ");
        $stmt -> bindParam(':custName', $this->custName );
        $passDetails=$this->password_generator();
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
            $stmt1= $this->conn->prepare("INSERT into customer_contact (custID,custContactNo) values (:custID, :custContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt1 -> bindParam(':custID', $last_id );
            $stmt1 -> bindParam(':custContactNo', $n);
            $stmt1->execute();
        }
        $stmt2= $this->conn->prepare("INSERT into cust_insurance (custID, startDate, type, paymentDate, status) values (:custID, :startDate, :type, :paymentDate, :status) ");
        $stmt2 -> bindParam(':custID', $last_id );
        $stmt2 -> bindParam(':startDate', date("Y-m-d"));
        $stmt2 -> bindParam(':type', $this->type );
        $stmt2 -> bindParam(':paymentDate', $this->paymentDate);
        $stmt2 -> bindParam(':status', $this->status );
        $stmt2->execute();

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
        $stmt= $this->conn->prepare("SELECT custID, custName from $this->table where custName
                            like '%$filter%' AND status=1");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function custFilterID($filter){
        $stmt= $this->conn->prepare("SELECT custID, custName from $this->table where custID
                            like '%$filter%' AND status=1");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCustByID($id){
        $stmt= $this->conn->prepare("SELECT custID, custName, custAddress, custNIC, custDOB, email, gender, policyID from $this->table where custID=$id AND status=1");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCustContactByID($id){
        $stmt= $this->conn->prepare("SELECT *  from customer_contact where custID=$id AND status=1");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getCustInsuranceByID($id){
        $stmt= $this->conn->prepare("SELECT * from cust_insurance where custID=$id AND status=1");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update(){
        $stmt= $this->conn->prepare("UPDATE $this->table set custName= :custName ,custAddress= :custAddress ,custNIC= :custNIC ,custDOB= :custDOB ,email= :email ,gender= :gender ,policyID= :policyID
                                                           where custID= :custID ");
        $stmt -> bindParam(':custID', $this->custID );
        $stmt -> bindParam(':custName', $this->custName );
        $stmt -> bindParam(':custAddress', $this->custAddress );
        $stmt -> bindParam(':custNIC', $this->custNIC );
        $stmt -> bindParam(':custDOB', $this->custDOB );
        $stmt -> bindParam(':email', $this->email );
        $stmt -> bindParam(':gender', $this->gender );
        $stmt -> bindParam(':policyID', $this->policyID );
        $stmt->execute();
        $stmt0= $this->conn->prepare(" DELETE FROM customer_contact WHERE custID = :custID");
        $stmt0 -> bindParam(':custID', $this->custID );
        $stmt0->execute();
        foreach($this->custContact as $number){
            $stmt1= $this->conn->prepare("INSERT into customer_contact (custID,custContactNo) values (:custID, :custContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt1 -> bindParam(':custID', $this->custID );
            $stmt1 -> bindParam(':custContactNo', $n);
            $stmt1->execute();
        }
        $stmt2= $this->conn->prepare("UPDATE cust_insurance  set  type=:type, paymentDate= :paymentDate where custID= :custID ");
        $stmt2 -> bindParam(':custID', $this->custID );
        $stmt2 -> bindParam(':type', $this->type );
        $stmt2 -> bindParam(':paymentDate', $this->paymentDate);
        // $stmt2 -> bindParam(':status', $this->status );
        $stmt2->execute();

    }
    public function resetPassword($custID){
        $passDetails=$this->password_generator();
        $stmt = $this->conn->prepare("UPDATE $this->table set password= :password ,hashPass= :hashPassword where custID= :custID ");
        $stmt -> bindParam(':password',  $passDetails[0]);
        $stmt -> bindParam(':hashPassword',  $passDetails[1]);
        $stmt -> bindParam(':custID', $custID );
        var_dump($passDetails);
        var_dump($stmt);

        $stmt->execute();
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
                                <h1>Wecare Customer Portal Account Recovery</h1>
                                <h4>Username: CUST'.$custID.'</h4>
                                <h4>Password: '.$passDetails[0].'</h4>
                            </center>
                        </div>
                    </body>
                </html>
                ';

        sendEmail($this->email, $this->custName,$email_string,"Wecare Customer Portal Account Recovery");

    }
    
    public function remove($id){
        $stmt0= $this->conn->prepare(" DELETE FROM customer_contact WHERE custID = :custID");
        $stmt0 -> bindParam(':custID', $id );
        $stmt0->execute();
        $stmt= $this->conn->prepare("UPDATE $this->table set custName= 'removed' ,custAddress= 'removed' ,custNIC= 'removed' ,custDOB= '2020-07-01' ,email= 'removed' ,gender= 'o',status=0 
                                                           where custID= :custID ");
        $stmt -> bindParam(':custID',  $id );
        $stmt->execute();
    }
}
?>