
<?php

class Promotion  extends Models{
    private $conn;
    private $table="promotion";
    private $id;
    private $type;
    private $date;
    private $image;

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
        $stmt= $this->conn->prepare("select * from $this->table order by id desc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDetails($_id){
        $stmt= $this->conn->prepare("select * from $this->table where id = $_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    public function setValue($type,$date,$image){
        $this->type= $type;
        $this->date= $date;
        $this->image= $image;
    } 

    public function create(){
        $stmt= $this->conn->prepare("insert into $this->table (type,date,image) values (:type, :date, :image)");
        $stmt -> bindParam(':date', $this->date );
        $stmt -> bindParam(':type', $this->type );
        $stmt -> bindParam(':image', $this->image );
        $stmt->execute();
    }

    public function update($_id){
        $stmt= $this->conn->prepare("update $this->table set type= :type, date= :date, image= :image where id = $_id ") ;

        $stmt -> bindParam(':date', $this->date);
        $stmt -> bindParam(':type', $this->type);
        $stmt -> bindParam(':image', $this->image);
        $stmt->execute();

    }

    public function deletePromo($_id){
        $stmt= $this->conn->prepare("Delete from $this->table where id = $_id ") ;   
        $stmt->execute();                                                  
    }
}
?>