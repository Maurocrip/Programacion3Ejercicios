const xhttp : XMLHttpRequest = new XMLHttpRequest();
const formData : FormData = new FormData();

function Agregar() {
    
    let legajo : number = (Number) ((<HTMLInputElement> document.getElementById("legajo")).value);
    let apellido: string = (<HTMLInputElement> document.getElementById("apellido")).value;
    let nombre: string = (<HTMLInputElement> document.getElementById("nombre")).value;

    xhttp.open("POST", "BACKEND/nexo_poo.php", true);

    formData.append('accion', "agregar");
    formData.append('legajo', legajo.toString());
    formData.append('apellido', apellido);
    formData.append('nombre', nombre);
        
    xhttp.send(formData);

    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
            console.log(xhttp.responseText);
        }
    };
}

function Listar() {

    xhttp.open("GET", "BACKEND/nexo_poo.php?accion=listar", true);

    xhttp.send();

    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
           (<HTMLDivElement> document.getElementById("divListado")).innerHTML = xhttp.responseText;
        }
    };	
}

function Verificar() {

    let legajo : number = (Number) ((<HTMLInputElement> document.getElementById("legajo_v")).value);

    xhttp.open("POST", "BACKEND/nexo_poo.php", true);

    formData.append('accion', "verificar");
    formData.append('legajo', legajo.toString());
        
    xhttp.send(formData);

    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
            console.log(xhttp.responseText);
        }
    };
}

function Modificar() {

    let legajo : number = (Number) ((<HTMLInputElement> document.getElementById("legajo_m")).value);
    let apellido: string = (<HTMLInputElement> document.getElementById("apellido_m")).value;
    let nombre: string = (<HTMLInputElement> document.getElementById("nombre_m")).value;

    xhttp.open("POST", "BACKEND/nexo_poo.php", true);

    formData.append('accion', "modificar");
    formData.append('legajo', legajo.toString());
    formData.append('apellido', apellido);
    formData.append('nombre', nombre);
        
    xhttp.send(formData);

    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
            console.log(xhttp.responseText);
        }
    };
}

function Borrar() {

    let legajo : number = (Number) ((<HTMLInputElement> document.getElementById("legajo_b")).value);

    xhttp.open("POST", "BACKEND/nexo_poo.php", true);

    formData.append('accion', "borrar");
    formData.append('legajo', legajo.toString());
        
    xhttp.send(formData);

    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            alert(xhttp.responseText);
            console.log(xhttp.responseText);
        }
    };
}