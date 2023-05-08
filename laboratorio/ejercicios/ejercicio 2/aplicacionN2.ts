/*Generar una aplicación Web, que permita al usuario ingresar el path de un archivo de texto. Al
pulsar un botón, y utilizando el objeto XMLHttpRequest, mostrar el contenido del archivo en
un <div>. En caso de que el archivo no exista, mostrar un mensaje de error por alert().*/
function Leer()
{
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    let formData : FormData = new FormData();
    let archivo : any = (<HTMLInputElement> document.getElementById("archivo"));
    
    xhttp.open("POST", "aplicacionN2.php", true);
    formData.append('archivo', archivo.files[0]);
    xhttp.setRequestHeader("enctype", "multipart/form-data");


    xhttp.send(formData);
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            (<HTMLDivElement> document.getElementById("mostrarArchivo")).innerHTML = xhttp.responseText;
        }
    };	
}