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
