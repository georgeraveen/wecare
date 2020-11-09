var slot1RowNo=1;
var slot2RowNo=2;
var slot3RowNo=3;

/////////////////////////////////////////////
var modal = document.getElementById("Modal");
var span = document.getElementsByClassName("close")[0];
var btnIDModel = document.getElementById("btnIDModel");
var newMedID = document.getElementById("newMedID");
span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
////////////////////////////////////////////////
var rosterTable = document.getElementById("rosterTable");

function addUser(id){
    // console.log(id);
    modal.style.display = "block";
    btnIDModel.value=id;
}
function addToTable(){
    var slotNo=btnIDModel.value[0];
    var columnNo=btnIDModel.value[1]
    var slotRow=slot1RowNo;
    var slotRowEnd=slot2RowNo;
    if (slotNo=="2") {slotRow=slot2RowNo;slotRowEnd=slot3RowNo}
    else if(slotNo=="3") {slotRow=slot3RowNo;slotRowEnd=rosterTable.rows.length}
    var insertRowNo=parseInt(slotRowEnd);

    if(rosterTable.rows[insertRowNo-1].cells[columnNo].innerHTML==""){
        for(var i=slotRow+1;i<insertRowNo;i++){
            if(rosterTable.rows[i].cells[columnNo].innerHTML==""){
                rosterTable.rows[i].cells[columnNo].innerHTML=newMedID.value;
                break;
            }
        }
        
    }
    else{
        var newRow = rosterTable.insertRow(insertRowNo);
        var newCells=[];
        for(var i=0;i<8;i++){
            newCells.push(newRow.insertCell(i));
        }
        newCells[columnNo].innerHTML=newMedID.value;

        if (slotNo==1) {
            slot2RowNo++;
            slot3RowNo++;
        }
        else if(slotNo==2) slot3RowNo++;
    }
    document.getElementById("A"+slotNo+columnNo).value+=(","+newMedID.value);
    modal.style.display = "none";
    
}