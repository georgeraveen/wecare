function showResult(str) {
    var searchby = "searchID";
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        console.log(this.responseText);
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("livesearch").innerHTML = this.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
        }
    }
    document.getElementById("livesearch").style.display = "block";
    xmlhttp.open("GET", "./../manageCustomer/getCust?" + searchby + "=" + str, true);
    xmlhttp.send();
}
///////////manage customer- DEO

function selectedCust(custID) {

    document.getElementById("custNameBox").value = custID.innerHTML;
    var id = custID.innerHTML.split(" ");
    document.getElementById("customer").value = id[0];

}

var dropdowns = document.getElementById("livesearch");
window.onclick = function (event) {
    if (event.target != dropdowns) {
        dropdowns.style.display = "none";
    }
}
