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

/* PUNTO 2*/
//COMPLETAR DOCUMENTACION
function cargarPartidas() {
    //ARRAY $coleccionPartidas
    
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
/** Función que muestra el menú principal en pantalla. Luego le pide la usuario que ingrese un número válido (correspondiente a la opción del menú que desea ejecutar). Si la opción no es válida, se le seguirá pidiendo al usuario un número, hasta que sea válido. La función retorna el número de opción elegida.
 * @return INT
*/
function seleccionarOpcion(){
  echo "Menú de opciones \n";
  echo "1- Jugar al Wordix con una palabra elegida \n";
  echo "2- Jugar al Wordix con una palabra aleatoria \n";
  echo "3- Mostrar una partida \n";
  echo "4- Mostrar la primer partida ganadora \n";
  echo "5- Mostrar resumen del jugador \n";
  echo "6- Mostrar listado de partidas ordenadas por jugador y por palabra \n";
  echo "7- Agregar una palabra de 5 letras a Wordix \n";
  echo "8- Salir del programa \n";
  echo " \n";
  echo "Ingrese la opción deseada: ";
  return solicitarNumeroEntre(1,8);
}

/**PUNTO 4 */



















/**PUNTO 5 */
/**Una funcion que solicite al usuario un numero entre un rango de valores. Si el numero ingresado por el usuario no es valido, la funcion se encarga de volver a pedirlo. La funcion retorna un numero valido. Tambien esta declarada en la biblioteca de wordix. Podriamos optimizar un poco ese mensaje */

























/**PUNTO 7 */
/** COMPLETAR DOCUMENTACION
* @param ARRAY $coleccionPalabras
* @return ARRAY 
*/
function agregarPalabra($coleccionPalabras)
{
  // STRING $palabra
  //INT $indice
  //BOOLEAN $palabraExiste
  //INT $cantidadPalabras
  $indice = 0;
  $palabraExiste = false;
  $cantidadPalabras = count($coleccionPalabras);
  $palabra = leerPalabra5letras(); //Funcion de wordix que descarta palabras que no sean de 5 letras y convierte las letras de en mayusculas
  do 
  { 
    if ($coleccionPalabras[$indice] == $palabra) { //verificamos que la palabra no esta en la coleccion
      $palabraExiste = true;
    } else {
      $indice++;
    }
  } while (!$palabraExiste && $indice < $cantidadPalabras);
  
  if (!$palabraExiste)//si la palabra no existe en la coleccion se agrega en el array 
  {
    array_push($coleccionPalabras, $palabra); 
    echo "Se agregó una nueva palabra a la colección!\n";
  }else{
    echo "La palabra ya existe en la colección\n";
  }
  return $coleccionPalabras;
}
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
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
