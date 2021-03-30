<?php

class viewRoster extends Controller{

    public function index(){
        $this->checkPermission("MED");
        $this->model('rosters');
        $rosters=new Rosters();
        $rosterDetails=$rosters->getAll();
        include './../app/header.php';
        $this->view('medScru/rosterHome',$rosterDetails);
        include './../app/footer.php';
        // echo "asas";
    }
    
    public function viewRoster(){
        $this->checkPermission("MED");
        try {
            if($_GET["viewRoster"]=="View"){
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
                $this->view('medScru/viewRoster',[$meds,$rosterDetails,$newSlots]);
                include './../app/footer.php';
            }
        } catch (\Throwable $th) {
            $_SESSION["errorMsg"]="Roster error";
            header("Location: ./index");
        }
    }
   
    
}