
<?php

class Insurance{
    private $conn;
    private $table="claim_case";

    public function __construct($db){
        $this->conn=$db;
    }
    public function read(){

    }
}
?>