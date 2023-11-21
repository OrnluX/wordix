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
  //INT $probabilidad

  $jugadores = ["ivan", "jose", "emiliano", "gaston", "german", "carolina", "antonella", "agustin", "gonzalo", "mario", "roberto", "cristian", "miguel", "daiana", "florencia", "marta", "julieta", "fernanda", "ana", "marcos"];

  $estadisticasPartidas = [];

  $nuevaPartida = [
       "palabraWordix" => "",
       "jugador" => "",
       "intentos" => 0,
       "puntaje" => 0
  ];
  
  $probabilidad = rand(1,10);
  
  for ($i = 0; $i < $cantidadPartidas; $i++) {
      $nuevaPartida["palabraWordix"] = $palabras[(rand(0,(count($palabras)-1)))];
      $nuevaPartida["jugador"] = $jugadores[(rand(0,(count($jugadores)-1)))];
      
      if ($probabilidad < 8) {
        $nuevaPartida["intentos"] = 6;
      }
      else {
        $nuevaPartida["intentos"] = rand(1,6);
      }
      
      if (($nuevaPartida["intentos"]) == 6) {
        $probabilidad = rand(1,10);
        if ($probabilidad < 8) {
          $nuevaPartida["puntaje"] = 0;
        }
        else {
          $nuevaPartida["puntaje"] = rand(3,6);
        }
      }
      else if (($nuevaPartida["intentos"]) > 3){
        $nuevaPartida["puntaje"] = rand(6,9);
      }
      else {
        $nuevaPartida["puntaje"] = rand(10,15);
      }
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

/**PUNTO 6 */
/** Función que dado un número de partida (que corresponde al índice de un arreglo indexado de partidas) muestra en pantalla los datos de una partida particular.
 * @param INT $nroPartida
 * @param ARRAY $datosPartidas
*/
function mostrarPartida($nroPartida, $datosPartidas) {
  //INT $indice
  if ($nroPartida > 0 && $nroPartida <= count($datosPartidas)) {
    $indice = $nroPartida -1;
    escribirAmarillo("***********************************************");
    echo " \n";
    echo "Partida WORDIX nro " . $nroPartida . ": palabra " . $datosPartidas[$indice]["palabraWordix"] . " \n";
    echo "Jugador/a: " . $datosPartidas[$indice]["jugador"] . " \n";
    echo "Puntaje: " . $datosPartidas[$indice]["puntaje"] . " puntos \n";
    if (($datosPartidas[$indice]["puntaje"]) == 0) {
      echo "Intento: No adivinó la palabra \n";
    } 
    else {
      echo "Intento: Adivinó la palabra en " . $datosPartidas[$indice]["intentos"] . " intento(s). \n";
    }
    escribirAmarillo("***********************************************");
    echo " \n";
  } 
  else {
    echo "Error. Partida no encontrada. Por favor ingrese un número de partida válido \n";
  }
}

/**PUNTO 7 */
/** COMPLETAR DOCUMENTACION
* @param ARRAY $coleccionPalabras
* @return ARRAY 
*/
function agregarPalabra($coleccionPalabras)
{
  //STRING $palabra
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

/**PUNTO 8 */
/** Función que dada una colección de partidas y el nombre de un jugador, retorna el índice de la primer partida ganada por dicho jugador. Si el jugador no ganó ninguna partida, la función retornará -1
 * @param ARRAY $partidas
 * @param STRING $nombre
 * @return INT
*/
function primerPartidaGanada($partidas, $nombre){
  //INT $indice
  $nombre = strtolower($nombre);
  $indice = 0;
  
  while ( $indice < count($partidas) && $partidas[$indice]["jugador"] != $nombre) {
    $indice++;
  }

  if ($indice == count($partidas)) {
    $indice = -1;
  }
  
  return $indice;
}

/**PUNTO 9 */
/** Función que dada la colección de partidas y el nombre de un jugador, retorna el resumen del mismo
 * @param ARRAY $partidas
 * @param STRING $nombreJugador
*/
function estadisticasJugador($partidas, $nombreJugador){
  //INT $partidasJugadas, $puntajeAcumulado, $victorias, $i
  //FLOAT $porcVictorias
  //ARRAY $adivinadaEnIntento
  //STRING $pluralSingular
  $adivinadaEnIntento = [
    "1" => 0,
    "2" => 0,
    "3" => 0,
    "4" => 0,
    "5" => 0,
    "6" => 0,
  ];
  
  $partidasJugadas = 0;
  $puntajeAcumulado = 0;
  $victorias = 0;
  $nombreJugador = strtolower($nombreJugador);
  for ($i=0; $i < count($partidas); $i++) { 
    if (($partidas[$i]["jugador"]) == $nombreJugador) {
      $partidasJugadas++;
      $puntajeAcumulado+=($partidas[$i]["puntaje"]);
      if (($partidas[$i]["puntaje"]) != 0) {
        $victorias++;
        foreach ($adivinadaEnIntento as $nroIntento => $adivinadas) {
          if ($nroIntento == ($partidas[$i]["intentos"])) {
            $adivinadaEnIntento[$nroIntento] = $adivinadas+=1;
          }
        }
      }
    }
  }
  
  if ($partidasJugadas == 0) {
    echo "El jugador " . $nombreJugador . " no ha registrado ninguna partida \n";
  }
  else {
    
    if ($victorias != 0) {
      $porcVictorias = ($victorias*100)/$partidasJugadas;
    }
    else {
      $porcVictorias = 0;
    }
    
    escribirAmarillo("***********************************************");
    echo " \n";
    echo "Jugador: " . $nombreJugador . " \n";
    echo "Partidas: " . $partidasJugadas . " \n";
    echo "Puntaje total: " . $puntajeAcumulado . " \n";
    echo "Victorias: " . $victorias . " \n";
    echo "Porcentaje de victorias: " . number_format($porcVictorias, 2) . " % \n\n";
    echo "\033[4mAdivinadas:\033[0m\n";
    foreach ($adivinadaEnIntento as $intento => $valor) {
      if (($adivinadaEnIntento[$intento]) == 1) {
        $pluralSingular = "vez.";
      } 
      else {
        $pluralSingular = "veces.";
      }
      echo "            Adivinó en el intento " . $intento . ": " . $valor . " ". $pluralSingular . " \n";
    }
    
    escribirAmarillo("***********************************************");
    echo " \n";
  }
}

/**PUNTO 10 */
/** Función que solicita al usuario el nombre de un jugador y retorna el mismo en minúsculas. La función se asegura que el nombre comience con una letra del alfabeto.
 * @return STRING 
*/
function solicitarJugador(){
  //STRING $jugador
  do {
    echo "Ingrese el nombre del jugador: ";
    $jugador = trim(fgets(STDIN));
    if ((ctype_alpha($jugador[0]))) {
      escribirVerde("El nombre ha sido ingresado correctamente... ");
      echo " \n";
    } 
    else {
      escribirRojo("Error. El nombre debe comenzar con una letra ");
      echo " \n";
    }
  } while (!(ctype_alpha($jugador[0])));
  return $jugador;
}

/**PUNTO 11 */
/** Función que dada una colección de partidas muestra la colección ordenada por el nombre de jugador y por palabra.
 * @param ARRAY $coleccionPartidas
*/
function ordenarPartidas($coleccionPartidas){
  
  /** Función interna, personalizada de ordenamiento. Compara dos valores de un arreglo asociativo, para ordenarlos. Primero ordena por nombre de jugador y luego por palabra. 
   * @param STRING $a
   * @param STRING $b
   * @return STRING
  */
  function compararJugadorPalabra($a, $b) {
    //STRING $resultado
    $resultado = strcmp($a['jugador'], $b['jugador']);
    
    if ($resultado === 0) {
        return strcmp($a['palabraWordix'], $b['palabraWordix']);
    }
    
    return $resultado;
  } 
  
  uasort($coleccionPartidas, 'compararJugadorPalabra'); //el método uasort ordena arreglos asociativos, manteniento la relación clave-valor luego del ordenamiento. El primer parámetro formal será el arreglo asociativo a ordenar. El segundo parámetro es una función personalizada de ordenamiento, que determina cómo se comparan los valores del arreglo asociativo.
  print_r($coleccionPartidas); //el método print_r se utiliza para mostrar información sobre variables de una manera legible. En este caso, la utilizamos en un arreglo indexado de arreglos asociativos. El método muestra la información de una manera estructurada y legible, indicando los índices, y los pares clave-valor.
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Prueba funcionalidad.
$partidasCargadas = cargarPartidas(100, cargarColeccionPalabras());
ordenarPartidas($partidasCargadas);


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

