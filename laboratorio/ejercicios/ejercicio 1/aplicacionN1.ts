/*Confeccionar un programa que solicite el ingreso de un número positivo (validar) y que
muestre en un <input type=”text”> la cantidad de números impares que hay entre ese número
y el cero. Realizarlo utilizando el objeto XMLHttpRequest.*/
function calcular()
{
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    let formData : FormData = new FormData();
    let numero : number = (Number) ((<HTMLInputElement> document.getElementById("numero")).value);

    if(numero>0)
    {
        xhttp.open("POST", "aplicacionN1.php", true);
        formData.append('numero', numero.toString());

        xhttp.send(formData);
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) 
            {
               (<HTMLDivElement> document.getElementById("mostrarnumeros")).innerHTML = xhttp.responseText;
            }
        };	
    }
    else
    {
        alert("el numero es menor o igual a 0");
    }
}