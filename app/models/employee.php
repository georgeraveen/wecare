
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
    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table");
        
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
            return substr(str_shuffle($data), 0, $chars);
        }

        $stmt= $this->conn->prepare("insert into $this->table (empFirstName,empLastName,password,gender,empDOB,empNIC,empAddress,email,empTypeID) 
                                                            values (:empFirstName, :empLastName, :password, :gender, :empDOB, :empNIC, :empAddress, :email, :empTypeID) ");
        $stmt -> bindParam(':empFirstName', $this->empFirstName );
        $stmt -> bindParam(':empLastName', $this->empLastName );
        $stmt -> bindParam(':password', password_generate(3) );
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

    }
}
?>