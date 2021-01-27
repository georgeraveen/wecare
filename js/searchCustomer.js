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
///////////manage customer- DEO

function selectedCust(custID) {
    var custIDD = document.getElementById("custID");
    var custIDD1 = document.getElementById("custID1");
    var removeBtnLink = document.getElementById("removeBtnLink");
    var custName = document.getElementById("custName");
    var custNIC = document.getElementById("custNIC");
    var dob = document.getElementById("dob");
    var gender = document.getElementById("gender");
    var email = document.getElementById("email");
    var custAddress = document.getElementById("custAddress");
    var policyID = document.getElementById("policyID");
    var custContact = document.getElementById("custContact");
    var paymentDate = document.getElementById("paymentDate");
    var custType = document.getElementById("custType");
    var updateForm = document.getElementById("updateForm");

    document.getElementById("custNameBox").value = custID.innerHTML;

    var xmlhttp = new XMLHttpRequest();
    try {
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                parser = new DOMParser();
                var text = this.responseText.replace("<?xml version=\"1.0\"?>", "");
                xmlDoc = parser.parseFromString(text, "text/xml");
                // console.log(text);
                // document.getElementById("err").innerHTML = text;
                updateForm.style.display = "block";
                updateForm.style.visibility = "visible";
                custIDD.value = custID.id;
                custIDD1.value = custID.id;
                removeBtnLink.href = "./removeCustomer/" + custID.id
                custName.value = xmlDoc.getElementsByTagName("custName")[0].innerHTML;
                custNIC.value = xmlDoc.getElementsByTagName("custNIC")[0].innerHTML;
                dob.value = xmlDoc.getElementsByTagName("custDOB")[0].innerHTML;
                gender.value = xmlDoc.getElementsByTagName("gender")[0].innerHTML;
                email.value = xmlDoc.getElementsByTagName("email")[0].innerHTML;
                custAddress.value = xmlDoc.getElementsByTagName("custAddress")[0].innerHTML;
                policyID.value = xmlDoc.getElementsByTagName("policyID")[0].innerHTML;
                custContact.value = xmlDoc.getElementsByTagName("custContact")[0].innerHTML;
                paymentDate.value = xmlDoc.getElementsByTagName("paymentDate")[0].innerHTML;
                custType.value = xmlDoc.getElementsByTagName("type")[0].innerHTML;
            }
        }


        xmlhttp.open("GET", "./getCustomer?id=" + custID.id, true);
        xmlhttp.send();
    } catch (error) {
        // console.log(error);
    }
}

var dropdowns = document.getElementById("livesearch");
window.onclick = function (event) {
    if (event.target != dropdowns) {
        dropdowns.style.display = "none";
    }
}

///////////manage med cond-DEO
function selectedCustMed(custID) {
    document.getElementById("custNameBox").value = custID.innerHTML;
    document.getElementById("custID").value = custID.id;
    document.getElementById("custID1").value = custID.id;
    //////////////////////////no need/////////////////////////////////////////////
    // var medDate = document.getElementById("medDate");
    // var type = document.getElementById("type");
    // var healthCondition = document.getElementById("healthCondition");
    // var comments = document.getElementById("comments");

    // var xmlhttp = new XMLHttpRequest();
    // try {
    //     xmlhttp.onreadystatechange = function () {
    //         if (this.readyState == 4 && this.status == 200) {
    //             parser = new DOMParser();
    //             var text = this.responseText.replace("<?xml version=\"1.0\"?>", "");
    //             xmlDoc = parser.parseFromString(text, "text/xml");
    //             console.log(xmlDoc);
    //         }
    //     }
    //     xmlhttp.open("GET", "./getMedConditionXML?id=" + custID.id, true);
    //     xmlhttp.send();
    // }
    // catch (error) {

    // }
}
function viewAdd() {
    if (document.getElementById("custID").value) {
        document.getElementById("addMedDiv").style.display = "block";
    }
    else {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
        setTimeout(function () {
            popup.classList.toggle("show");
        }, 2000)
    }
}