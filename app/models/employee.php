
<?php

class Employee extends Models{
    private $conn;
    private $table="employee";
    private $empID;
    private $empFirstName;
    private $empLastName;
    private $gender;
    private $empDOB;
    private $empNIC;
    private $empAddress;
    private $email;
    private $empTypeID;
    private $empContactNo;


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
        $stmt= $this->conn->prepare("select * from $this->table where (status = 1)");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllView(){
        $stmt= $this->conn->prepare("select empID,empFirstName,empLastName,gender,empNIC,empAddress,email,empTypeID from $this->table where (status=1)");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDetails($_id){
        $stmt= $this->conn->prepare("select * from $this->table where empID= $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getContactDetails($_id){
        $stmt= $this->conn->prepare("select * from employee_contact where empID= $_id");

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getEmpByType($empType){
        $stmt= $this->conn->prepare("select * from $this->table where empTypeID = :empType ");
        $stmt -> bindParam(':empType',$empType);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getEmpByTypeList($empType){
        $stmt= $this->conn->prepare("select empID,empFirstName,empLastName from $this->table where empTypeID = :empType ");
        $stmt -> bindParam(':empType',$empType);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function setValue($empFirstName,$empLastName,$gender,$empDOB,$empNIC,$empAddress,$email,$empTypeID,$empContactNo){
        $this->empFirstName= $empFirstName;
        $this->empLastName= $empLastName;
        $this->gender= $gender;
        $this->empDOB= $empDOB;
        $this->empNIC= $empNIC;
        $this->empAddress =  $empAddress;
        $this->email= !empty($email) ? $email : null;
        $this->empTypeID=$empTypeID;
        $this->empContactNo= explode(',',$empContactNo);   
    }
    public function create(){
        function password_generate($chars){
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            $randPass=substr(str_shuffle($data), 0, $chars);
            return array($randPass,password_hash( $randPass, PASSWORD_DEFAULT, [ 'cost' => 11 ] ));
        }

        $stmt= $this->conn->prepare("insert into $this->table (empFirstName,empLastName,password,hashPass,gender,empDOB,empNIC,empAddress,email,empTypeID) 
                                                            values (:empFirstName, :empLastName, :password, :hashPassword, :gender, :empDOB, :empNIC, :empAddress, :email, :empTypeID) ");
        $stmt -> bindParam(':empFirstName', $this->empFirstName );
        $stmt -> bindParam(':empLastName', $this->empLastName );
        $passDetails=password_generate(3);
        $stmt -> bindParam(':password', $passDetails[0]);
        $stmt -> bindParam(':hashPassword',  $passDetails[1]);
        $stmt -> bindParam(':gender', $this->gender );
        $stmt -> bindParam(':empDOB', $this->empDOB );
        $stmt -> bindParam(':empNIC', $this->empNIC );
        $stmt -> bindParam(':empAddress', $this->empAddress );
        $stmt -> bindParam(':email', $this->email );
        $stmt -> bindParam(':empTypeID', $this->empTypeID );
        $stmt->execute();
        $last_id = $this->conn->lastInsertId();
        foreach($this->empContactNo as $number){
            $stmt1= $this->conn->prepare("insert into employee_contact (empID,empContactNo) 
                                                            values (:empID, :empContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt1 -> bindParam(':empID', $last_id );
            $stmt1 -> bindParam(':empContactNo', $n);
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
                        <h1>Wecare Employee Portal Registration</h1>
                        <h4>Username: '.$this->empTypeID.$last_id.'</h4>
                        <h4>Password: '.$passDetails[0].'</h4>
                    </center>
                </div>
            </body>
        </html>
        ';

        sendEmail($this->email, $this->empFirstName.$this->empLastName ,$email_string,"Wecare Employee Portal Registration");
    }
    public function update($_id){
        $stmt= $this->conn->prepare("update $this->table set empFirstName= :empFirstName, empLastName= :empLastName, gender= :gender, empDOB= :empDOB,
                                                            empNIC= :empNIC, empAddress= :empAddress, email= :email, empTypeID= :empTypeID
                                                             where empID = $_id ") ;

        $stmt -> bindParam(':empFirstName', $this->empFirstName );
        $stmt -> bindParam(':empLastName', $this->empLastName );
        $stmt -> bindParam(':gender', $this->gender );
        $stmt -> bindParam(':empDOB', $this->empDOB );
        $stmt -> bindParam(':empNIC', $this->empNIC );
        $stmt -> bindParam(':empAddress', $this->empAddress );
        $stmt -> bindParam(':email', $this->email );
        $stmt -> bindParam(':empTypeID', $this->empTypeID );
        $stmt->execute();

        $stmt1= $this->conn->prepare("delete from employee_contact where empID= $_id");
        $stmt1->execute();

        foreach($this->empContactNo as $number){
           
            $stmt= $this->conn->prepare("insert into employee_contact (empID,empContactNo) 
                                                            values (:empID, :empContactNo) ");
                                                            
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt -> bindParam(':empID', $_id );
            $stmt -> bindParam(':empContactNo', $n);
            $stmt->execute();
        }


    }
    public function updateStatus($_id){

        $stmt= $this->conn->prepare("update $this->table set status= 0
                                                            where empID = $_id ") ;   
        $stmt->execute();                                                  

    }
}
?>