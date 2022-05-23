rmCheck = document.getElementById("checkRemember");
user = document.getElementById("user");
var mostrar=0;
//Al entrar a la pantalla de login comprobamos en el localStorage si hay que activar el checknox y rellenar el campo de usuario

if (localStorage.checkbox && localStorage.checkbox !== "") {
    rmCheck.setAttribute("checked", "checked");
    user.value = localStorage.username;
} else {
    rmCheck.removeAttribute("checked");
    user.value = "";
}

function lsRememberMe() {
    localStorage.username = user.value;
    localStorage.checkbox = rmCheck.value;
    /*
    // Si el check está marcado y el usuario no está vacio guardamos los valores en el localStorage
    if (rmCheck.checked && user.value !== "") {
        localStorage.username = user.value;
        localStorage.checkbox = rmCheck.value;
    }
    //Si el check está desmarcado vaciamos los valores en el localStorage
    else {
        localStorage.username = "";
        localStorage.checkbox = "";
    }
    */
   
}

