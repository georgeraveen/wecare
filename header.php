<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href= "./../css/header.css">
  <title>WeCare Life</title>
</head>
<body>
<?php

session_start();
if($_SESSION["rolecode"] =='CUST'){
  $home="./../customer.php";
}
else{
  $home="./../";
}
?>
<div class="fixed-header">
    <div class="containerHeader">
        <nav>
            <a href= <?php echo "\"$home\"";?>><img class="logo" src="./../images/logo.png"></a>
            <a href= <?php echo "\"$home\"";?>><div>
              Welcome to WeCare 
              <?php   
                if($_SESSION["rolecode"] =='DEO'){
                  echo "Data Entry Officer";
                }
                else if($_SESSION["rolecode"] =='FAG'){
                  echo "Field Agent";
                }
                else if($_SESSION["rolecode"] =='DOC'){
                  echo "Doctor";
                }
                else if($_SESSION["rolecode"] =='MGR'){
                  echo "Manager";
                }
                else if($_SESSION["rolecode"] =='MED'){
                  echo "Medical Scrutinizer";
                }
                else if($_SESSION["rolecode"] =='CUST'){
                  echo "Customer Web Portal";
                }
              ?>
            </div></a>
            
            <a class="avatar" href="#"><?php echo $_SESSION["custName"]; ?></a>
            <a class="logout" href="./../logout.php">Logout</a>
        </nav>
    </div>
</div>
    
    
  
