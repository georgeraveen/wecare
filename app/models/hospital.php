
<?php

class HospitalView  extends Models{
    private $conn;
    private $table="hospital";

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }

    public function getAll(){
        $stmt= $this->conn->prepare("select name,hospitalContactNo,address from $this->table INNER JOIN hospital_contact on $this->table.hospitalID=hospital_contact.hospitalID");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setValue($name,$address,$hospitalContactNo){
        $this->name= $name;
        $this->address= $address;
        $this->empContactNo= explode(',',$hospitalContactNo); 
    } 

    public function create(){

        $stmt= $this->conn->prepare("insert into $this->table (name,address) values (:name, :address)");
        $stmt -> bindParam(':name', $this->name );
        $stmt -> bindParam(':address', $this->address );
        $stmt->execute();
        $last_id = $this->conn->lastInsertId();
        foreach($this->hospitalContactNo as $number){
            $stmt1= $this->conn->prepare("insert into hospital_contact (hospitalID,hospitalContactNo) 
                                                                                    values (:hospitalID, :hospitalContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt1 -> bindParam(':hospitalID', $last_id );
            $stmt1 -> bindParam(':hospitalContactNo', $n);
            $stmt1->execute();
        }
    }
}
?>