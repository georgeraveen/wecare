<?php

class Roster extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        $this->model('rosters');
        $rosters=new Rosters();
        $rosterDetails=$rosters->getAll();
        include './../app/header.php';
        $this->view('manager/rosterHome',$rosterDetails);
        include './../app/footer.php';
        // echo "asas";
    }
    public function createNew(){
        $this->checkPermission("MGR");
        $this->model("employee");
        $emp = new Employee();
        $meds = $emp->getEmpByType("MED");
        include './../app/header.php';
        $this->view('manager/createRoster',[$meds]);
        include './../app/footer.php';
        // echo "asas";
    }
    public function viewRoster(){
        $this->checkPermission("MGR");
        try {
            if($_GET["viewRoster"]=="View/Update"){
                $this->model("employee");
                $emp = new Employee();
                $meds = $emp->getEmpByType("MED");

                $this->model('rosters');
                $rostID=$this->valValidate($_GET["rostID"]);
                $roster=new Rosters();
                $rosterDetails=$roster->getRoster($rostID);
                if(!$rosterDetails) throw new Exception("");

                $slotDetails=$roster->getSlots($rostID);
                // var_dump($slotDetails);
                $newSlots=[];
                foreach ($slotDetails as $value) {
                    $slotMeds=$roster->getMeds($value["slotID"]);
                    $value["meds"]=$slotMeds;
                    // array_push($newSlots,$value);
                    $box=$value["timeSlotNo"].$value["day"];
                    $newSlots[$box]=$value;
                }
                // var_dump($newSlots);
                include './../app/header.php';
                $this->view('manager/viewRoster',[$meds,$rosterDetails,$newSlots]);
                include './../app/footer.php';
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Roster error";
            header("Location: ./index");
        }
    }
    public function createRoster(){
        $this->checkPermission("MGR");
        $this->model('rosters');
        $newRoster= new Rosters();
        try {
            $newRoster->startTrans();
            if($_POST["submitRoster"]){
                $newRosterID = $newRoster->create( $this->valValidate($_POST['rosterDate']));
                for($j=1;$j<=3;$j++){
                    for($i=1;$i<=7;$i++){
                        $empList=explode(",",$this->valValidate($_POST["A".$j.$i]));
                        // echo count($empList);
                        if(count($empList)>1){
                            $newSlotID=$newRoster->newSlot($j,$i);
                            $result=$newRoster->insertEmp($newSlotID,$empList);
                        }
                    }
                }
            }
            $newRoster->transCommit();
            $_SESSION["successMsg"]="New roster created successfully";
        } catch (\Throwable $th) {
            $newRoster->transRollBack();
            $_SESSION["errorMsg"]="Error occured when inserting values";
            throw $th;
        }
        header("Location: ./index");
    }
    public function updateRoster(){
        $this->checkPermission("MGR");
        $this->model('rosters');
        $newRoster= new Rosters();
        try {
            $newRoster->startTrans();
            $newRoster->deleteRoster($this->valValidate($_POST["rosterID"]));
            if($_POST["submitRoster"]){
                $newRosterID = $newRoster->create( $this->valValidate($_POST['rosterDate']));
                for($j=1;$j<=3;$j++){
                    for($i=1;$i<=7;$i++){
                        $empList=explode(",",$this->valValidate($_POST["A".$j.$i]));
                        // echo count($empList);
                        if(count($empList)>1){
                            $newSlotID=$newRoster->newSlot($j,$i);
                            $result=$newRoster->insertEmp($newSlotID,$empList);
                        }
                    }
                }
            }
            $newRoster->transCommit();
            $_SESSION["successMsg"]="Roster updated successfully";
        } catch (\Throwable $th) {
            $newRoster->transRollBack();
            $_SESSION["errorMsg"]="Error occured when updating values";
            throw $th;
        }
        header("Location: ./index");
    }
    
}