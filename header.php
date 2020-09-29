<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href= "./../css/header.css">
  <title>WeCare Life</title>
</head>
<body>
<div class="fixed-header">
    <div class="container">
        <nav>
            <a href="./../"><img class="logo" src="./../images/logo.png"></a>
            <a href="./../"><div>
              WeCare - 
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
                else if($_SESSION["rolecode"] =='MST'){
                  echo "Medical Scrutinizer";
                }
              ?>
            </div></a>
            
            <a class="avatar" href="#"><?php echo $_SESSION["fName"][0].$_SESSION["lName"][0]; ?></a>
            <a class="logout" href="./../logout.php">Logout</a>
        </nav>
    </div>
</div>
    
    
  
