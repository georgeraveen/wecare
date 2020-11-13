var roleSelect = document.getElementById("empTypeID");
var empSp = document.getElementById("empSp");

function roleChange(ele){
  if(ele.value=="DOC"){
    empSp.value="";
    empSp.parentElement.removeAttribute("hidden");
    empSp.labels[0].textContent="Speciality";
  }
  else if(ele.value=="FAG"){
    empSp.value="";
    empSp.parentElement.removeAttribute("hidden");
    empSp.labels[0].textContent="Allocated Area";

  }
  else{
    empSp.parentElement.setAttribute("hidden",true);
    empSp.value="empty";
  }
}