var deleteFil = document.getElementById("deleteFile");

function sendDelete(id) {
    deleteFil.value += ("," + id);
    var dBtn = document.getElementById("btn-" + id);
    var dTxt = document.getElementById("txt-" + id);
    dBtn.style.display = "none";
    dTxt.style.textDecoration = "line-through";
}