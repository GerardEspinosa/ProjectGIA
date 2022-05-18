if (localStorage.checkbox && localStorage.checkbox !== "") {
    var nombre = localStorage.username;
    var users = document.getElementsByClassName("user_loged");
    for(var i = 0; i < users.length; i++){
        users[i].value = nombre;
    }
}