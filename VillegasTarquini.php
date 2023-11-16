<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Tarquini, Sergio Ivan. FAI-5010. TUDW. ivantarquini91@gmail.com. Github: OrnluX */
/* Villegas, Agustin. FAI 4366. TUDW. maximiliano.villegas@est.fi.uncoma.edu.ar. Github: Villegas7 */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CERCA", "AYUDA", "DEDOS", "FORMA", "GASTO" 
    ];

    return ($coleccionPalabras);
}

/* PUNTO 2 EXPLICACION 3 */
/**una funcion llamada cargarPartidas que inicialice una estructura de datos con ejemplos de partidas y que retorne la coleccion de partidas. Minimo 10 partidas donde vayan variando los jugadores, las palabras, los intentos y los puntajes. En algunos casos las palabras y los jugadores se deben repetir */

function cargarPartidas ()
{
    /*
    array $coleccionPartidas
    */
    $coleccionPartidas = [];
    $p1 = ["palabraWordix" => "QUESO", "jugador" => "ivan", "intentos" => 0, "puntaje" => 8];
    $p2 = ["palabraWordix" => "AYUDA", "jugador" => "agus", "intentos" => 5, "puntaje" => 10];
    $p3 = ["palabraWordix" => "HUEVO", "jugador" => "exe", "intentos" => 2, "puntaje" => 7];
    $p4 = ["palabraWordix" => "TINTO", "jugador" => "karim", "intentos" => 0, "puntaje" => 8];
    $p5 = ["palabraWordix" => "RASGO", "jugador" => "karim", "intentos" => 3, "puntaje" => 0];
    $p6 = ["palabraWordix" => "AYUDA", "jugador" => "ivan", "intentos" => 0, "puntaje" => 9];
    $p7 = ["palabraWordix" => "CERCA", "jugador" => "lolo", "intentos" => 4, "puntaje" => 7];
    $p8 = ["palabraWordix" => "GASTO", "jugador" => "exe", "intentos" => 4, "puntaje" => 0];
    $p9 = ["palabraWordix" => "QUESO", "jugador" => "adrian", "intentos" => 2, "puntaje" => 0];
    $p10 = ["palabraWordix" => "GOTAS", "jugador" => "maxi", "intentos" => 5, "puntaje" => 7];
    $p11 = ["palabraWordix" => "FORMA", "jugador" => "ivan", "intentos" => 0, "puntaje" => 9];
    $p12 = ["palabraWordix" => "DEDOS", "jugador" => "karim", "intentos" => 3, "puntaje" => 10];

array_push($coleccionPartidas, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12);
return $coleccionPartidas;
}































/**PUNTO 3 */
/**Para visualizar el menu de opciones, una funcion seleccionarOpcion que muestre las opciones del menu en la pantalla, le solicite al usuario una opcion valida (si la opcion no es valida vuelta a solicitarla en la misma funcion hasta que la opcion lo sea), y retorne el numero de la opcion elegida. La ultima opcion debe ser salir */


















/**PUNTO 4 */
/**Una opcion que pida al usuario ingresar una palabra de 5 letras y retorne la palabra. En la biblioteca wordix ya esta declarada. Aca tenemos que llamarla unicamente. La llamada va a retornar la palabra en mayusculas si cumple con la validacion interna de la funcion. */


















/**PUNTO 5 */
/**Una funcion que solicite al usuario un numero entre un rango de valores. Si el numero ingresado por el usuario no es valido, la funcion se encarga de volver a pedirlo. La funcion retorna un numero valido. Tambien esta declarada en la biblioteca de wordix. Podriamos optimizar un poco ese mensaje */

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
