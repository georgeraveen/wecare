
<?php
session_start();
$_SESSION["portal"]="dataEntry";

require_once '../app/init.php';

$app = new App;