
<?php

class Hospital  extends Models{
    private $conn;
    private $table="hospital";
    private $name;
    private $address;
    private $hosContactNumbers;

    public function __construct(){
        $this->conn=$this->dataConnect();
    }
    public function read(){

    }

    public function getAll(){
        $stmt= $this->conn->prepare("select * from $this->table LEFT JOIN hospital_contact on $this->table.hospitalID=hospital_contact.hospitalID where status = 1");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDetails($_id){
        $stmt= $this->conn->prepare("select * from $this->table where hospitalID = $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getContactDetails($_id){
        $stmt= $this->conn->prepare("select * from hospital_contact where hospitalID = $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setValue($name,$address,$hospitalContactNo){
        $this->name= $name;
        $this->address= $address;
        $this->hosContactNumbers= explode(',',$hospitalContactNo); 
    } 

    public function create(){

        $stmt= $this->conn->prepare("insert into $this->table (name,address) values (:name, :address)");
        $stmt -> bindParam(':name', $this->name );
        $stmt -> bindParam(':address', $this->address );
        $stmt->execute();
        $last_id = $this->conn->lastInsertId();
        foreach($this->hosContactNumbers as $number){
            $stmt1= $this->conn->prepare("insert into hospital_contact (hospitalID,hospitalContactNo) 
                                                                                    values (:hospitalID, :hospitalContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt1 -> bindParam(':hospitalID', $last_id );
            $stmt1 -> bindParam(':hospitalContactNo', $n);
            $stmt1->execute();
        }
    }

    public function update($_id){
        $stmt= $this->conn->prepare("update $this->table set name= :name, address= :address 
                                                             where hospitalID = $_id ") ;

        $stmt -> bindParam(':name', $this->name);
        $stmt -> bindParam(':address', $this->address);
        $stmt->execute();

        $stmt1= $this->conn->prepare("delete from hospital_contact where hospitalID= $_id");
        $stmt1->execute();

        foreach($this->hosContactnumbers as $number){
            
            $stmt= $this->conn->prepare("insert into hospital_contact (hospitalID,hospitalContactNo) 
                                                            values (:hospitalID, :hospitalContactNo) ");
            $n=(int)$number;
            // echo $last_id."-".$n;
            $stmt -> bindParam(':hospitalID', $_id );
            $stmt -> bindParam(':hospitalContactNo', $n);
            $stmt->execute();
        }


    }
}
?>