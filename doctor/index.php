
<?php
session_start();
$_SESSION["portal"]="doctor";

require_once '../app/init.php';

$app = new App;