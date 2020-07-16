<?php
require_once("./../config/config.php");

echo $_SESSION["user_id"]." ";
 echo $_SESSION["rolecode"];
 print_r($_SESSION);
 if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("./../index.php");
}
 if($_SESSION["rolecode"]!="MGR"){
    die("You dont have the permission to access this page");
 }

 
 if (!isset($_SESSION["access"])) {

    try {
        $sql = "SELECT * from auth_module where 1 group by moduleGroupNo order by moduleGroupNo asc, moduleID asc";
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $commonModules = $stmt->fetchAll();

        $sql = "SELECT * from auth_module where 1 order by moduleGroupNo asc, moduleID asc";
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $allModules = $stmt->fetchAll();

        $sql = "SELECT * FROM employee_auth WHERE  empTypeID = :rc ORDER BY moduleID ASC";

        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":rc", $_SESSION["rolecode"]);
        
        
        $stmt->execute();
        $userRights = $stmt->fetchAll();
        $_SESSION["access"] = set_rights($allModules, $userRights, $commonModules);
    } catch (Exception $ex) {

        echo $ex->getMessage();
    }
}


?>