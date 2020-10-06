
var modal = document.getElementById("editModal");
// var modaltext = document.getElementById("modaltext");

var span = document.getElementsByClassName("close")[0];
var inDate = document.getElementById("medDate");
var inType = document.getElementById("type");
var inHealthCondition = document.getElementById("healthCondition");
var inComments = document.getElementById("comments");
var inMedID = document.getElementById("medID");

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function clickView(id) {
    
    // modaltext.innerHTML="asd"+id;
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
    console.log("hi"+id+type.innerHTML);
}