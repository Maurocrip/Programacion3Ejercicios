"use strict";
function comprobarDisponibilidad() {
    var xhr = new XMLHttpRequest();
    var nombreUsuario = (document.getElementById("username").value);
    var formData = new FormData();
    xhr.open("POST", "aplicacionN7.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    formData.append('username', nombreUsuario);
    xhr.send(formData);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado").innerHTML = this.responseText;
        }
    };
}
//# sourceMappingURL=aplicacionN7.js.map