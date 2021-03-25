<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href= "./../../css/header.css">
  <link rel="stylesheet" href= "./../../css/alert.css">
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
  $home="./../../employee";
}
?>
<div class="fixed-header">
    <div class="containerHeader">
        <nav>
            <a class="Link" href= <?php echo "\"$home\"";?>><img class="logo" src="./../../images/logo.png"></a>
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
            <div class="dropdown-header avatar">
              <a class="btn-Link" href="#" style="color:black">
              <?php 
              if($_SESSION["rolecode"] =='CUST'){
                echo explode(" ",$_SESSION["custName"])[0];
              }
              else{
                echo $_SESSION["fName"][0].$_SESSION["lName"][0];
              }
              ?>
              </a>
              <div class="dropdown-content-header">
                <span>
                <?php 
                if($_SESSION["rolecode"] =='CUST'){
                  echo $_SESSION["custName"];
                }
                else{
                  echo $_SESSION["fName"]." ".$_SESSION["lName"];
                }
                echo "</span><br><span>";
                if($_SESSION["rolecode"] =='DEO'){
                  echo " Type : ".$_SESSION["deoType"];
                }
                else if($_SESSION["rolecode"] =='FAG'){
                  echo " Area : ".$_SESSION["area"];
                }
                else if($_SESSION["rolecode"] =='DOC'){
                  echo " Specialization : ".$_SESSION["specialization"];
                }
                ?> 
                </span>
              </div>
            </div>
            
            <a class="logout btn-Link" href="./../login/logout">Logout</a>
        </nav>
    </div>
</div>
<?php
if( $_SESSION["successMsg"] || $_SESSION["errorMsg"]){

  include './../app/error.php';
}

?>
<div id="content">    <!-- start content used for loader -->
  
