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