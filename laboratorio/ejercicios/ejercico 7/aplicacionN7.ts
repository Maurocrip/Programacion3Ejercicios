/*Normalmente, cuando se valida la disponibilidad de un nombre de usuario, se muestra una lista
de valores alternativos en el caso de que el nombre elegido no esté disponible. Modificar el
ejercicio anterior para que permita mostrar una serie de valores alternativos devueltos por el
servidor.
Si el nombre de usuario está ocupado, los nombres de usuario alternativos se deben mostrar
en forma de lista de elementos (<ul></ul>). Para ello generar un archivo de texto con varios
nombres.
Modificar la lista anterior para que muestre enlaces (<a>) para cada uno de los nombres
alternativos. Al pinchar sobre el enlace de un nombre alternativo, se copia en el cuadro de
texto del login del usuario.*/

function comprobarDisponibilidad() 
{
    let xhr : XMLHttpRequest = new XMLHttpRequest();
    let nombreUsuario : string = ((<HTMLInputElement>document.getElementById("username")).value);
    let formData : FormData = new FormData();
    
    xhr.open("POST", "aplicacionN7.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    formData.append('username', nombreUsuario);
    xhr.send(formData);

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            (<HTMLDivElement> document.getElementById("resultado")).innerHTML = this.responseText;
        }
    };
}