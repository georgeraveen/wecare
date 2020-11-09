
<?php
session_start();
$_SESSION["portal"]="fieldAgent";

require_once '../app/init.php';

$app = new App;