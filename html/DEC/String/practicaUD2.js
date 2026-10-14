
//Declarar variables
//let numero1 = 1357;
//let numero2 = 135.7;
//let numero3 = 135e7;
//let numero4 = 0b1010;
//let numero5 = 0o1357;
//let numero6 = 0x1A57;

//Ejercicio 1

//document.write(numero1 + " - " + typeof numero1 + "<br>");
//document.write(numero2 + " - " + typeof numero2 + "<br>");
//document.write(numero3 + " - " + typeof numero3 + "<br>");
//document.write(numero4 + " - " + typeof numero4 + "<br>");
//document.write(numero5 + " - " + typeof numero5 + "<br>");
//document.write(numero6 + " - " + typeof numero6 + "<br>");



//Ejercicio 2

//let numero = Number(prompt("Introduce un numero: "));
//document.write(" Numero introducido: " + numero + " - " + typeof numero + "<br>");

//Ejercicio 3

//let numero = Number(prompt("Introduce un numero: "));
//let numero2 = Number(prompt("Introduce un numero: "));
//document.write(" Numero introducido: " + numero + " + " + numero2 + "<br>");

//numero = Number(numero);
//numero2 = Number(numero2);

//document.write(" Suma : " + (numero + numero2) + " - " + typeof + "<br>");

//Ejercicio 4

//let nombre = prompt("Introduce tu nombre: ");
//let apellido = prompt("Introduce tu apellido: ");
//let edad = parseInt(prompt("Introduce tu edad: "));
//let numero = parseInt(prompt("Introduce un numero del 1 al 10: "));

//console.log(`Mi nombre es: ${nombre}, mi apellido: ${apellido} y mi edad es: ${edad}`);

//document.write(`Mi nombre es: ${nombre}, mi apellido: ${apellido} y mi edad es: ${edad}`);

//alert(`Dentro de ${numero} años tendrás ${edad + numero} años.`);


//Ejercicio 5


//let nombre = prompt("Introduce tu nombre:");
//let aficion = prompt("¿Cuál es tu afición favorita?:");
//let programar = confirm("Te gusta programar? (Aceptar = Sí / Cancelar = No)");

//let respuesta = programar ? "sí" : "no";

//const textoFinal = `Hola, me llamo ${nombre}, mi afición favorita es ${aficion} y ${respuesta} me gusta programar.`;

//document.write(`<p>${textoFinal}</p>`);

//Ejercicio 6

//let nombre = prompt("Introduce un String: ");
//let posicion = nombre.indexOf("a");

//document.write("La primera A está en la posición: " + posicion);

//Ejercicio 7

//let nombre = prompt("Introduce un String con espacios,dos delante y dos detras!!: ");
//let espacio = nombre.trim();
//let mayuscula = nombre.toUpperCase();

//console.log(nombre);
//console.log(espacio);
//console.log(mayuscula);
//console.log(espacio.slice(0, 3));

// Ejercicio8

//let nombre = prompt("Primer String: ");
//let nombre1 = prompt("Busca en la palabra del String: ");
//let nombre2 = prompt("Cambia el String por esta palabra: ");

//let resultado = nombre.replaceAll(nombre1, nombre2);
//document.write(resultado);

//Ejercicio9


//Ejercicio 10

// Pedir los dos strings al usuario
//let textoPrincipal = prompt("Introduce el primer string (texto principal):");
//let subcadena = prompt("Introduce el segundo string (lo que deseas buscar):");

// Si el usuario cancela o deja vacío el segundo string, evitamos un bucle infinito o error
//if (subcadena === "") {
//console.log("El segundo string no puede estar vacío.");
//} else {
// Contar las apariciones dividiendo el texto
//  let apariciones = textoPrincipal.split(subcadena).length - 1;

// Mostrar el resultado
//document.write(`El segundo string aparece ${apariciones} veces en el primero.`);//

//}

// Ejercicio 12
//let a = prompt("Primer numero:");
//let b = prompt("Segundo numero");

//alert(1 +
//    1
//    + 1);

//Ejercicio 11

//console.log("" + 1 + 0);//solo te lo une!
//console.log("" - 1 + 0);//-1
//console.log(true + false);//1
//console.log(6 / 3);//2
//console.log("2" * "3");//6
//console.log(4 + 5 + "px");//9px
//console.log("$" + 4 + 5);//$45
//console.log("4" - 2);//2
//console.log("-9" + 5);//-95
//console.log("-9" - 5);//-14
//console.log(null + 1);//1
//console.log(undefined + 1);//NaN
//console.log("\t \n" - 2);//-2

//Ejercicio 13

//let a = 1;
//let b = 1;
//let c = ++a;
//let d = b++;

//console.log(a, b, c, d);//a = 2 , b = 1 + 1 = 2 , c = 1 + 1 = 2,d = 1 

//Ejercicio 14

//console.log(5 > 4);//true
//console.log("apple" > "pineapple");//false
//console.log("2" > "12");//true
//console.log(undefined == null);//true
//console.log(undefined === null);//false
//console.log(null == "\n0\n");//false
//console.log(null === + "\n0\n");//false

//Ejercicio 15

//console.log("5" + 3);//53 concatena
//console.log("5" - 3);//2 resta
//console.log("5" * "2");//10 multiplica
//console.log(true + 1);//2 esto no se 
//console.log("3" + 4 + 5);//345 concatena por que esta las comillas antes
//console.log(3 + 4 + "5");//75 y suma por que las comillas estan despues 

// Ejercicio 16

//let cantidad1;
//let cantidad2 = null;
//let cantidad3 = 0;
//let cantidad4 = "";
//let cantidad5 = 5;

//console.log(cantidad1 || 10); //10
//console.log(cantidad2 || 10); //10
//console.log(cantidad3 || 10); //10
//console.log(cantidad4 || 10); //10
//console.log(cantidad5 || 10); //5 distintos

//console.log(cantidad1 ?? 10); //10
//console.log(cantidad2 ?? 10); //10
//console.log(cantidad3 ?? 10); //0 distintos,usariamos height
//console.log(cantidad4 ?? 10); //"" distintos
//console.log(cantidad5 ?? 10); //5 distintos

//height || 100 verifica si height es “falso”, y 0 lo es. - así el resultado de || es el segundo argumento, 100. height ?? 100 verifica si height es null / undefined, y no lo es. - así el resultado es height como está, que es 0.

// Ejercicio 17

// 1. Pedimos el número al usuario y lo convertimos a entero
//let minutosTotales = parseInt(prompt("Introduce un numero entero:"));

// 2. Calculamos las horas (quitando los decimales con Math.floor)
//let horas = Math.floor(minutosTotales / 60);

// 3. Calculamos los minutos que sobran con el operador módulo (%)
//let minutosRestantes = minutosTotales % 60;

// 4. Mostramos el resultado en la consola
//console.log(horas + " horas y " + minutosRestantes + " minutos");

// También puedes mostrarlo en una alerta flotante:
//alert(horas + " horas y " + minutosRestantes + " minutos");


//Ejercico 18
//no estaban definidas las variables y ni la j...

//console.log(a);
//var a = 5;

//if (true) {
//    var x = 1;
//    var y = 2;
//}
//console.log(x);
//console.log(y);

//for (var i = 0; i < 3; i++) { }
//console.log(i);

//for (var j = 0; j < 3; j++) { }
//console.log(j);

//Ejercicio 19

//let nombre = prompt("Escribe algo: ");
//if (nombre) {
//    console.log("Has escrito algo");
//} else {
//    console.log("No has escrito nada");
//}

//Ejercicio 20

//let numero = Number(prompt("Introduce un número:"));

//let mensaje = numero >= 0
//    ? "El número es mayor o igual que cero"
//    : "El número es menor que cero";

//console.log(mensaje);

//Ejercicio 21

//let edad = parseInt(prompt("Introduce tu edad:"));

//if (edad < 13) {
//    console.log("Niño");
//} else if (edad < 27) {
//    console.log("Joven");
//} else if (edad < 66) {
//    console.log("Adulto");
//} else {
//    console.log("Jubilado");
//}

//Ejercicio 22

//let fruta = prompt("Introduce el nombre de una fruta en español:");

//switch (fruta) {
//    case "Pera":
//        console.log("Pear");
//        break;
//    case "Manzana":
//        console.log("Apple");
//        break;
//    case "Piña":
//        console.log("Pineapple");
//        break;
//    case "Fresa":
//        console.log("Strawberry");
//        break;
//    case "Naranja":
//        console.log("Oranje");
//        break;
//    default:
//        console.log("Fruta desconocida");
//}

//Ejercicio 23

//let fruta = prompt("Introduce el nombre de una fruta en español:");
//fruta = fruta.charAt(0).toUpperCase() + fruta.slice(1);

//switch (fruta) {
//    case "Pera": console.log("Pear"); break;
//    case "Manzana": console.log("Apple"); break;
//    case "Piña": console.log("Pineapple"); break;
//    case "Fresa": console.log("Strawberry"); break;
//    case "Naranja": console.log("Oranje"); break;
//    default: console.log("Fruta desconocida");
//}

//Ejercicio 25 

let numero;

do {
    numero = parseInt(prompt("Introduce un número del 1 al 10:"));
} while (isNaN(numero) || numero < 1 || numero > 10);//comprueba si es un numero,si no sigue preguntandotelo

for (let i = 1; i <= 10; i++) {
    console.log(`${numero} por ${i} = ${numero * i}`);
}