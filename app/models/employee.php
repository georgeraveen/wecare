
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
    private $area;
    private $specialization;
    private $type;


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
        $stmt= $this->conn->prepare("SELECT * from $this->table where (status = 1)");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getAllView(){
        $stmt= $this->conn->prepare("SELECT empID,empFirstName,empLastName,gender,empNIC,empAddress,email,empTypeID from $this->table where (status=1)");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDetails($_id){
        $stmt= $this->conn->prepare("SELECT * from $this->table where empID= $_id and status=1 ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getContactDetails($_id){
        $stmt= $this->conn->prepare("SELECT * from employee_contact where empID= $_id ");

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getEmpByType($empType){
        $stmt= $this->conn->prepare("SELECT * from $this->table where empTypeID = :empType and status=1 ");
        $stmt -> bindParam(':empType',$empType);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getEmpByTypeList($empType){
        if($empType=="FAG"){
            $stmt= $this->conn->prepare("SELECT emp.empID,empFirstName,empLastName,area from $this->table as emp inner join field_agt as fag on emp.empID=fag.empID where empTypeID = :empType ");
        }
        else{
            $stmt= $this->conn->prepare("SELECT empID,empFirstName,empLastName from $this->table where empTypeID = :empType ");
        }
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
                        <p>We warmly welcome you to wecare family. Please find the below credentials to access the employee web portal at <a href="https://websolutionz.tech/wecare/employee">https://websolutionz.tech/wecare/employee</a></p>
                        <h4>Username: '.$this->empTypeID.$last_id.'</h4>
                        <h4>Password: '.$passDetails[0].'</h4>
                    </center>
                </div>
            </body>
        </html>
        ';

        sendEmail($this->email, $this->empFirstName.$this->empLastName ,$email_string,"Wecare Employee Portal Registration");
        return $last_id;
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

        $stmt= $this->conn->prepare("update $this->table set status= 0,hashPass=NULL
                                                            where empID = $_id ") ;   
        $stmt->execute();                                                  

    }
    public function setValueFAG($empSp){
        $this->area= $empSp;
    }
    public function createFAG($_id){
        $stmt= $this->conn->prepare("insert into field_agt (empID,area) 
                                                            values ($_id,:area)");
        $stmt -> bindParam(':area', $this->area );
        $stmt->execute();       
    }
    public function setValueDOC($empSp){
        $this->specialization= $empSp;
    }
    public function createDOC($_id){
        $stmt= $this->conn->prepare("insert into doctor (empID,specialization) 
                                                            values ($_id,:specialization)");
        $stmt -> bindParam(':specialization', $this->specialization );
        $stmt->execute();       
    }
    public function fagDetails($_id){
        $stmt= $this->conn->prepare("SELECT * from field_agt where empID= $_id ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function docDetails($_id){
        $stmt= $this->conn->prepare("SELECT * from doctor where empID= $_id ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function deleteFAG($_id){
        $stmt= $this->conn->prepare("delete from field_agt where empID= $_id");
        $stmt->execute();
    }
    public function deleteDOC($_id){
        $stmt= $this->conn->prepare("delete from doctor where empID= $_id");
        $stmt->execute();
    }
    public function setValueDEO($empSp){
        $this->type= $empSp;
    }
    public function createDEO($_id){
        $stmt= $this->conn->prepare("insert into data_entry (empID,type) 
                                                            values ($_id,:type)");
        $stmt -> bindParam(':type', $this->type );
        $stmt->execute();       
    }
    public function deoDetails($_id){
        $stmt= $this->conn->prepare("SELECT * from data_entry where empID= $_id ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function deleteDEO($_id){
        $stmt= $this->conn->prepare("delete from data_entry where empID= $_id");
        $stmt->execute();
    }
    public function resetPassword($empID){
        $passDetails=$this->password_generator();
        $stmt = $this->conn->prepare("UPDATE $this->table set password= :password ,hashPass= :hashPassword where empID= :empID ");
        $stmt -> bindParam(':password',  $passDetails[0]);
        $stmt -> bindParam(':hashPassword',  $passDetails[1]);
        $stmt -> bindParam(':empID', $empID );
        //var_dump($passDetails);
        //var_dump($stmt);

        $stmt->execute();
        $stmt = $this->conn->prepare("SELECT email,empFirstName,empLastName,empTypeID from $this->table  where empID= :empID ");
        $stmt -> bindParam(':empID', $empID );
        $stmt->execute();
        $result=$stmt->fetchAll();
        //var_dump($result);
        //var_dump($result[0]['email']);
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
                                <h4>Username:'.$result[0]['empTypeID'].$empID.'</h4>
                                <h4>Password: '.$passDetails[0].'</h4>
                            </center>
                        </div>
                    </body>
                </html>
                ';

        sendEmail($result[0]["email"],$result[0]["empFirstName"]." ".$result[0]["empLastName"],$email_string,"Wecare Customer Portal Account Recovery");

    }
}
?>