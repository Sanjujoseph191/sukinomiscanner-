function checkInteger(name, pid) {
    document.getElementById(pid).style.display = "none";
    field = document.getElementById(name).value;
    var numbers = /^[0-9]+$/;
    if (!(field.match(numbers))) {
        document.getElementById(pid).style.display = "";
        document.getElementById(pid).style.color = "red";
        document.getElementById(pid).innerHTML = "This Field must be an integer";
        return true;
    }
}
function checkEmpty(name, pid) {
    document.getElementById(pid).style.display = "none";
    field = document.getElementById(name).value;
    if(field==''){
        document.getElementById(pid).style.display = "";
        document.getElementById(pid).style.color = "red";
        document.getElementById(pid).innerHTML = "This Field is required";
        return true;
    }
}
function checkFloat(name, pid) {
    document.getElementById(pid).style.display = "none";
    field = document.getElementById(name).value;
    var numbers = /^\d*\.{0,1}\d+$/;
    if (!(field.match(numbers))) {
        document.getElementById(pid).style.display = "";
        document.getElementById(pid).style.color = "red";
        document.getElementById(pid).innerHTML = "This Field must be a numeric";
        return true;
    }
}



