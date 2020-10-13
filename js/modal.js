var modal = document.getElementById("Modal");
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
////////////////////////////DEO modal view case//////////////////////////////////

var inDate = document.getElementById("medDate");
var inType = document.getElementById("type");
var inHealthCondition = document.getElementById("healthCondition");
var inComments = document.getElementById("comments");
var inMedID = document.getElementById("medID");

function clickView(id) {
    var medDate = document.getElementById("date-"+id);
    var type = document.getElementById("type-"+id);
    var healthCondition = document.getElementById("healthCondition-"+id);
    var comments = document.getElementById("comments-"+id);
    
    inDate.value=medDate.innerHTML;
    inType.value=type.innerHTML;
    inHealthCondition.value= healthCondition.innerHTML;
    inComments.value=comments.innerHTML;
    inMedID.value=id;

    modal.style.display = "block";
}



////////////////////////////cutomer feedback modal//////////////////////////////////

function openFeedback(id) {
    var custFeedbackBox = document.getElementById("custFeedbackBox-"+id);
    var custFeedbackModal = document.getElementById("custFeedback");
    var claimIDModal = document.getElementById("claimIDD");
    // console.log(id);
    // console.log(claimIDModal);
    claimIDModal.value=id;
    custFeedbackModal.value=custFeedbackBox.value;

    modal.style.display = "block";
}
/////////////////customer med modal
function clickViewMed(id) {
  var medDate = document.getElementById("date-"+id);
  var type = document.getElementById("type-"+id);
  var healthCondition = document.getElementById("healthCondition-"+id);
 
  inDate.value=medDate.innerHTML;
  inType.value=type.innerHTML;
  inHealthCondition.value= healthCondition.innerHTML;
  
  modal.style.display = "block";
}
//////////////customer promotion
function viewPromo(){
  modal.style.display = "block";
}