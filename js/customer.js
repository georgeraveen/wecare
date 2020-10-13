function addNumber() {
    var newNumber = document.getElementById("contact").value;
    if(newNumber=="") return;
    var newContact = document.createElement("h5");
    newContact.innerHTML = newNumber+"    <button class=\"btn-rm\" type=\"button\" onClick=\"removeNum("+newNumber+")\">X</button>";
    newContact.id=newNumber;
    document.getElementById("contactList").appendChild(newContact);
    document.getElementById("custContacts").value += (","+newNumber);
    document.getElementById("contact").value="";
  }

function removeNum(rmid){
    var rmEle=document.getElementById(rmid);
    var newVal=document.getElementById("custContacts");
    newVal.value= newVal.value.replace((","+rmid),"");
    rmEle.remove();
}