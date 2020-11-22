function showResult(str) {
    var searchby = (document.getElementById("byName").checked) ? "searchName" : "searchID";
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    document.getElementById("livesearch").style.display = "block";
    xmlhttp.open("GET", "./getCust?" + searchby + "=" + str, true);
    xmlhttp.send();
}
function selectedCust(custID){
    // console.log(custID);
    document.getElementById("custName").value=custID.innerHTML;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseXML);
            document.getElementById("form-container").innerHTML = this.responseText;
            // document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    xmlhttp.open("GET", "./getCustomer?id=" + custID.id, true);
    xmlhttp.send();
}

var dropdowns = document.getElementById("livesearch");
window.onclick = function (event) {
    if (event.target != dropdowns) {
        dropdowns.style.display = "none";
    }
}