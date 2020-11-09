
<?php
session_start();
$_SESSION["portal"]="customer";

require_once '../app/init.php';

$app = new App;