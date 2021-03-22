const inputs = document.querySelectorAll('.input');


function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}
function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove('focus');
    }
}
inputs.forEach(input => {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);
})

function forgot() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
    setTimeout(function () {
        popup.classList.toggle("show");
    }, 3000)
}