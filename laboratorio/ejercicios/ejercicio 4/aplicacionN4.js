"use strict";
function Calcular() {
    var xhttp = new XMLHttpRequest();
    var formData = new FormData();
    var numero1 = (document.getElementById("numero1").value);
    var operador = (document.getElementById("operador").value);
    var numero2 = (document.getElementById("numero2").value);
    xhttp.open("POST", "aplicacionN4.php", true);
    formData.append('numero1', numero1);
    formData.append('operador', operador);
    formData.append('numero2', numero2);
    xhttp.send(formData);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("mostrarResultado").innerHTML = xhttp.responseText;
        }
    };
}
//# sourceMappingURL=aplicacionN4.js.map