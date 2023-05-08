"use strict";
function verificar() {
    var xhttp = new XMLHttpRequest();
    var formData = new FormData();
    var usuario = (document.getElementById("usuario").value);
    xhttp.open("POST", "comprobarDisponibilad.php", true);
    formData.append('usuario', usuario);
    xhttp.send(formData);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("mostrarResultado").innerHTML = xhttp.responseText;
        }
    };
}
//# sourceMappingURL=aplicacionN6.js.map