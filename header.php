<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href= "./../css/header.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a class="Link" href= <?php echo "\"$home\"";?>><img class="logo" src="./../images/logo.png"></a>
            <a class="Link" href= <?php echo "\"$home\"";?>><div>
              WeCare 
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
            
            <a class="avatar btn-Link" href="#">
            <?php 
            if($_SESSION["rolecode"] =='CUST'){
              echo $_SESSION["custName"];
            }
            else{
              echo $_SESSION["fName"][0].$_SESSION["lName"][0];
            }
             ?></a>
            <a class="logout btn-Link" href="./../logout.php">Logout</a>
        </nav>
    </div>
</div>
    
    
  
