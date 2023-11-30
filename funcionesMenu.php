<?php
/** Función correspondiente al menú principal, opciones 1 y 2. En la opción 1 el jugador juega Wordix con una palabra elegida e ingresada por él mismo. En la opción 2, juega un partida de Wordix con una palabra elegida al azar por el programa. La función devuelve el arreglo de la nueva partida.
 * @param ARRAY $palabrasWordix
 * @param ARRAY $partidasWordix
 * @param INT $opcionMenu
 * @return ARRAY
*/
function opcionMenu1y2($palabrasWordix, $partidasWordix, $opcionMenu) {
  //STRING $jugador, $palabra
  //ARRAY $nuevaPartida
  //BOOLEAN $palabraUtilizada
    
  $jugador = solicitarJugador(); 
  $palabraUtilizada = true;
  $nuevaPartida = [];

  while ($palabraUtilizada) {
    $palabra = obtenerPalabra($palabrasWordix, $opcionMenu);
    $palabraUtilizada = verificarPalabra($partidasWordix, $jugador, $palabra);

    if (!$palabraUtilizada) {
      $nuevaPartida = jugarWordix($palabra, $jugador);
    }
    else {
      if ($opcionMenu == 1) {
        escribirRojo("Palabra ya utilizada por el jugador. Por favor ingrese otra palabra");
        echo " \n";
      }
    }
  }

  return $nuevaPartida;
}

/** Función correspondiente a la opción número 3 del menú principal. Pide al usuario un número de partida y llama a una función "mostrarPartida" pasándole por parámetro dicho número y la colección de partidas jugadas generadas en la sesión actual. Si la partida existe, muestra sus datos. Caso contrario pide nuevamente al usuario que ingrese un número válido.
* @param ARRAY $coleccionPartidas
*/
function menuOpcion3($coleccionPartidas) {
    //INT $partidaNro
      
    echo "Ingrese el número de partida que desea visualizar: ";
    $partidaNro = solicitarNumeroEntre(1, count($coleccionPartidas));
    $partidaNro-=1;
    echo "Buscando partida... \n\n";
    mostrarPartida($partidaNro, $coleccionPartidas); 
}
  
/** Función correspondiente a la opción número 4 del menú principal. Consulta en la base de datos de las partidas existentes, la primer partida ganada por un jugador. En caso de existir esos datos, los muestra por pantalla, de lo contrario mostrará un mensaje por pantalla. 
* @param ARRAY $coleccionPartidas 
*/
function menuOpcion4($coleccionPartidas) {
    //STRING $jugador
    //INT $indice
    $jugador = solicitarJugador();
    $indice = primerPartidaGanada($coleccionPartidas, $jugador);
    if ($indice != (-1)) {
      mostrarPartida(($indice), $coleccionPartidas);
    }
    else {
      escribirRojo("El/la jugador/a " . $jugador . " no ganó ninguna partida");
      echo " \n";
    }
}
  
/**  Función correspondiente a la opción número 5 del menú principal. Muestra las estadísticas de un jugador. Partidas jugadas, ganadas y porcentaje de victorias.
* @param ARRAY $coleccionPartidas
*/
function menuOpcion5($coleccionPartidas){
    //STRING $jugador
    //ARRAY $resumenJugador
    //FLOAT $porcVictorias

    $jugador = solicitarJugador();
    $resumenJugador = estadisticasJugador($coleccionPartidas, $jugador);
    $porcVictorias = 0;
    
    if ($resumenJugador["partidas"] == 0) {
      echo "El jugador " . $resumenJugador["jugador"] . " no ha registrado ninguna partida \n";
    }
    else {
      if ($resumenJugador["victorias"] != 0) {
        $porcVictorias = ($resumenJugador["victorias"]*100)/$resumenJugador["partidas"];
      }
      else {
        $porcVictorias = 0;
      }

      escribirGris("***********************************************");
      echo " \n";
      echo "Jugador: " . $resumenJugador["jugador"] . " \n";
      echo "Partidas: " . $resumenJugador["partidas"] . " \n";
      echo "Puntaje total: " . $resumenJugador["puntaje"] . " \n";
      echo "Victorias: " . $resumenJugador["victorias"] . " \n";
      echo "Porcentaje de victorias: " . number_format($porcVictorias, 2) . " % \n\n";
      echo "\033[4mAdivinadas:\033[0m\n";
      foreach ($resumenJugador as $clave => $valor) {
        if (strpos($clave, "intento") === 0) {
          echo $clave . " :" . $valor . " \n"; 
        }
      }
      escribirGris("***********************************************");
      echo " \n";
    }
}

/**************************************/
/****** FUNCIONES COMPLEMENTARIAS******/
/**************************************/
/** Función diseñada para el menú principal. Cualquiera sea la tecla que ingrese el usuario se mostrará de nuevo el menú.
 * 
*/
function presionarEnterContinuar(){
    escribirAmarillo("Presione ENTRAR para continuar");
    trim(fgets(STDIN));
}
  
/** Función que verifica si un jugador ya jugó una partida con una palabra. Si ya existe una partida, la función devuelve true, de lo contrario devuelve false.
* @param ARRAY $partidas
* @param STRING $nombreJugador 
* @param STRING $palabra
* @return BOOLEAN
*/
function verificarPalabra($partidas, $nombreJugador, $palabra) {
    //BOOLEAN $palabraUtilizada
    //INT $indice
    $palabraUtilizada = false;
    $indice = 0;
    while (!$palabraUtilizada && $indice < count($partidas)) {
      if (($partidas[$indice]["jugador"]) == $nombreJugador && ($partidas[$indice]["palabraWordix"]) == $palabra) {
        $palabraUtilizada = true;
      }
      $indice ++;
    }
    return $palabraUtilizada;
}

/**
 * Función que, según la opción que se le pasa por parámetro, obtiene una palabra de un arreglo indexado de palabras. En la primera opción la elección de la palabra estará a cargo del usuario. En la segunda opción, la palabra será elegida aleatoriamente. La función retorna la palabra para jugar la partida.
 * @param ARRAY $palabras
 * @param INT $opcion
 * @return STRING
 */
function obtenerPalabra($palabras, $opcion) {
  //STRING $palabra
  //INT $indicePalabra
  if ($opcion == 1) {
    echo "Por favor, ingrese un numero de palabra con la que desea jugar Wordix: ";
    $indicePalabra = solicitarNumeroEntre(1, count($palabras));
    $palabra = $palabras[($indicePalabra-1)];
  } 
  else if ($opcion == 2) {
    $palabra = $palabras[rand(0, (count($palabras)-1))];
  }
  return $palabra;
}
?>