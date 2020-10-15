
<?php
session_start();
$_SESSION["portal"]="employee";

require_once '../app/init.php';

$app = new App;