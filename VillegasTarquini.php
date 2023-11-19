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
 * @return ARRAY
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
/** Función que inicializa una estructura de datos con ejemplos de partidas y retorna la colección con datos aleatorios. El número de partidas es arbitrario.
 * @param INT $cantidadPartidas
 * @param ARRAY $palabras
 * @return ARRAY
*/
function cargarPartidas ($cantidadPartidas, $palabras) {
  //ARRAY $estadisticasPartidas, $nuevaPartida, $jugadores

  $jugadores = ["ivan", "jose", "emiliano", "gaston", "german", "carolina", "antonella", "agustin", "gonzalo", "mario", "roberto", "cristian", "miguel", "daiana", "florencia", "marta", "julieta", "fernanda", "ana", "marcos"];

  $estadisticasPartidas = [];

  $nuevaPartida = [
       "palabraWordix" => "",
       "jugador" => "",
       "intentos" => 0,
       "puntaje" => 0
  ];
  
  for ($i = 0; $i < $cantidadPartidas; $i++) {
      $nuevaPartida["palabraWordix"] = $palabras[(rand(0,19))];
      $nuevaPartida["jugador"] = $jugadores[(rand(0,19))];
      $nuevaPartida["intentos"] = rand(1,6);
      $nuevaPartida["puntaje"] = rand(1,12);
      array_push($estadisticasPartidas, $nuevaPartida);
  }
    return $estadisticasPartidas;
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

