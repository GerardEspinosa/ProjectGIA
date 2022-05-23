function myFunction() {
    var x = document.getElementById("personalData");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    } 
}

document.getElementById("personalData").style.display = "none";
document.getElementById("personalData").style.position = "absolute";

/*if (localStorage.checkbox && localStorage.checkbox !== "") {
    var nombre = localStorage.username;

    document.getElementById("userName").innerText = local;
}
*/

