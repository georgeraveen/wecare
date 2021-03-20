<div id="alert" class="alert<?php
    echo ($_SESSION["successMsg"]) ? " success": "";
  ?>">

  <span class="closebtn">&times;</span>  
  <?php
    echo ($_SESSION["errorMsg"]) ? $_SESSION["errorMsg"]: "";
    echo ($_SESSION["successMsg"]) ? $_SESSION["successMsg"]: "";
  ?>
</div>


<?php
$_SESSION["successMsg"]="";
$_SESSION["errorMsg"]="";

?>