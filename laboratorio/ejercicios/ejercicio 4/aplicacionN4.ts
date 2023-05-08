/*Escribir un programa que posea dos <input type=”text”> (uno para cada operando) y un
<select> con los símbolos matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’. De acuerdo al símbolo, se deberá
realizarse la operación indicada y mostrarse el resultado por pantalla (en un <span>). Realizar
dicha operatoria con el objeto XMLHttpRequest.*/
function Calcular()
{
    let xhttp : XMLHttpRequest = new XMLHttpRequest();
    let formData : FormData = new FormData();
    let numero1 : string =((<HTMLInputElement> document.getElementById("numero1")).value);
    let operador : string =((<HTMLInputElement> document.getElementById("operador")).value);
    let numero2 : string =((<HTMLInputElement> document.getElementById("numero2")).value);

    xhttp.open("POST", "aplicacionN4.php", true);
    formData.append('numero1', numero1);
    formData.append('operador', operador);
    formData.append('numero2', numero2);

    xhttp.send(formData);
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            (<HTMLDivElement> document.getElementById("mostrarResultado")).innerHTML = xhttp.responseText;
        }
    };	
}