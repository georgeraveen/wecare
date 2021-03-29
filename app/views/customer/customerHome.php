<?php
var_dump($data);
$result=$data;
?>
<link rel="stylesheet" href= "./../../css/homeCust.css">
<link rel="stylesheet" href= "./../../css/modal.css">

<img src="./../../images/undraw_medical_care_movn.svg" class="img-background">
<a href="#">
<div class="container-notifi">
    <div class="notification-item" >
        <img src="./../../images/icons8-notification-100.png" class="notiIcon">
    </div>
</div>
</a>
<div class="grid-container">
  <a class="grid-item hide" href="#">
  
  </a>
  <a class="grid-item" href="./../customerProfile/index">View my profile
    <br><br>
    <img src="./../../images/icons8-name-50.png" class="homeIcon">
  </a></a>
  <a class="grid-item hide" href="#">
    
  </a></a>
  <a class="grid-item" href="./../custMedCondition/index">View my medical history
    <br><br>
    <img src="./../../images/icons8-treatment-64.png" class="homeIcon">
  </a>
  <a class="grid-item" href="#" onClick="viewPromo()">View promotions
    <br><br>
    <img src="./../../images/icons8-discount-50.png" class="homeIcon">
  </a></a>
  
  <a class="grid-item" href="./../custViewCases/index">View my claim history
    <br><br>
    <img src="./../../images/icons8-order-history-64.png" class="homeIcon">
  </a></a>
</div>



<div id="Modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div>
        
               <table>
               <?php
              
                foreach($result as $row){
                  echo "<tr>".
                        "<td id=\"image-".$row['id']."\"><img class=\"thumb-promo\" src=\"./../../documents/promo/".$row['image']."\"/></td>".
                        "</tr>";
                }
              

                ?>
                </table>
    </div>
  </div>

</div>
<script src="./../../js/modal.js"></script>