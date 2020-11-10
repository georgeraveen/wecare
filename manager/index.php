
<?php
session_start();
$_SESSION["portal"]="manager";

require_once '../app/init.php';

$app = new App;