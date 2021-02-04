<?php

class Roster extends Controller{

    public function index(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/rosterHome');
        include './../app/footer.php';
        // echo "asas";
    }
    public function createNew(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/createRoster');
        include './../app/footer.php';
        // echo "asas";
    }
    public function viewRoster(){
        $this->checkPermission("MGR");
        include './../app/header.php';
        $this->view('manager/viewRoster');
        include './../app/footer.php';
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
    
}