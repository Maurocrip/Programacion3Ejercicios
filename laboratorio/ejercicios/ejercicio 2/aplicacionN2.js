"use strict";
function Leer() {
    var xhttp = new XMLHttpRequest();
    var formData = new FormData();
    var archivo = document.getElementById("archivo");
    xhttp.open("POST", "aplicacionN2.php", true);
    formData.append('archivo', archivo.files[0]);
    xhttp.setRequestHeader("enctype", "multipart/form-data");
    xhttp.send(formData);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("mostrarArchivo").innerHTML = xhttp.responseText;
        }
    };
}
//# sourceMappingURL=aplicacionN2.js.map