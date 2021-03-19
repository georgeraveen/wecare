
<?php
class Rosters  extends Models{
    private $conn;
    private $table="roster";
    private $rosterID;
    private $date;
    private $managerID;
    private $slotIDs=array();

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
        $stmt= $this->conn->prepare("select * from $this->table");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function create($rosterDate){
        $stmt=$this->conn->prepare("Insert into $this->table (date,managerID) values(:date,:managerID)");
        $stmt -> bindParam(':date', $rosterDate );
        $stmt -> bindParam(':managerID', $_SESSION["user_id"] );
        $stmt->execute();
        $last_id = $this->conn->lastInsertId();
        $this->date=$rosterDate;
        $this->managerID=$_SESSION["user_id"];
        $this->rosterID=$last_id;
        return $last_id;
    }
    public function newSlot($timeSlot,$day){
        $stmt=$this->conn->prepare("Insert into time_slot (rosterID,day,timeSlotNo) values(:rosterID,:day,:timeSlotNo)");
        $stmt -> bindParam(':rosterID', $this->rosterID );
        $stmt -> bindParam(':day', $day );
        $stmt -> bindParam(':timeSlotNo', $timeSlot);
        $stmt->execute();
        $last_id = $this->conn->lastInsertId();
        array_push($this->slotIDs,$last_id);
        return $last_id;
    }
    public function insertEmp($slotID,$empList){
        // var_dump( $empList);
        $empString="";
        for($k=1;$k<count($empList);$k++){
            $emp=$empList[$k];
            $empString=$empString."( $emp , $slotID ),";
        }
        $empString=rtrim($empString,', ');
        // echo $empString;
        $stmt=$this->conn->prepare("Insert into time_slot_med (medScruID,slotID) values ".$empString);
        $stmt->execute();
    }
    public function getRoster($rosterID){
        var_dump($rosterID);
        $stmt=$this->conn->prepare("SELECT * from $this->table where rosterID=$rosterID");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getSlots($rosterID){
        $stmt=$this->conn->prepare("SELECT * from time_slot where rosterID=$rosterID");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getMeds($slotID){
        $stmt=$this->conn->prepare("SELECT t.*,e.empFirstName,e.empLastName,e.empID from time_slot_med t INNER JOIN employee e ON
                                    t.medScruID=e.empID  where t.slotID=$slotID");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function deleteRoster($rosterID){
        $stmt=$this->conn->prepare("DELETE from roster where rosterID=:rosterID");
        $stmt->bindParam(':rosterID',$rosterID);
        $stmt->execute();
        return;
    }
}
?>