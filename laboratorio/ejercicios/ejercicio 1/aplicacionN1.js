"use strict";
function calcular() {
    var xhttp = new XMLHttpRequest();
    var formData = new FormData();
    var numero = (Number)(document.getElementById("numero").value);
    if (numero > 0) {
        xhttp.open("POST", "aplicacionN1.php", true);
        formData.append('numero', numero.toString());
        xhttp.send(formData);
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("mostrarnumeros").innerHTML = xhttp.responseText;
            }
        };
    }
    else {
        alert("el numero es menor o igual a 0");
    }
}
//# sourceMappingURL=aplicacionN1.js.map