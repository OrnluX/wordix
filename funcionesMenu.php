<?php
/** Función correspondiente al menú principal, opciones 1 y 2. En la opción 1 el jugador juega Wordix con una palabra elegida e ingresada por él mismo. En la opción 2, juega un partida de Wordix con una palabra elegida al azar por el programa.
 * @param ARRAY $palabrasWordix
 * @param ARRAY $partidasWordix
 * @param INT $opcionMenu
*/
function opcionMenu1y2($palabrasWordix, &$partidasWordix, $opcionMenu) {
    //STRING $jugador, $palabra
    //ARRAY $nuevaPartida
    //BOOLEAN $palabraUtilizada
    
    do {
        $jugador = solicitarJugador(); 
      if ($opcionMenu == 1) {
        $palabra = leerPalabra5Letras();
      }
      else if ($opcionMenu == 2) {
        $palabra = $palabrasWordix[rand(0, (count($palabrasWordix)-1))];
      }
      
      $palabraUtilizada = verificarPalabra($partidasWordix, $jugador, $palabra);
      
      if (!$palabraUtilizada) {
        $nuevaPartida = jugarWordix($palabra, $jugador);
        array_push($partidasWordix, $nuevaPartida);
      }
      else {
        escribirRojo("Palabra ya utilizada por el jugador. Por favor ingrese otra palabra");
        echo " \n";
      }
    
    } while ($palabraUtilizada);
}

/** Función correspondiente a la opción número 3 del menú principal. Pide al usuario un número de partida y llama a una función "mostrarPartida" pasándole por parámetro dicho número y la colección de partidas jugadas generadas en la sesión actual. Si la partida existe, muestra sus datos. Caso contrario pide nuevamente al usuario que ingrese un número válido.
* @param ARRAY $coleccionPartidas
*/
function menuOpcion3($coleccionPartidas) {
    //INT $partidaNro
    //BOOLEAN $existe
    do {
      echo "Ingrese el número de partida que desea visualizar: ";
      $partidaNro = trim(fgets(STDIN));
      echo "Buscando partida... \n\n";
      $existe = mostrarPartida((intval($partidaNro)), $coleccionPartidas);
    } while (!$existe);
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
      mostrarPartida(($indice+1), $coleccionPartidas);
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
    $jugador = solicitarJugador();
    estadisticasJugador($coleccionPartidas, $jugador);
}

/**************************************/
/****** FUNCIONES COMPLEMENTARIAS******/
/**************************************/
/** Función diseñada para el menú principal. Cualquiera sea la tecla que ingrese el usuario se mostrará de nuevo el menú.
 * @return INT
*/
function presionarEnterContinuar(){
    //STRING $tecla
    //INT $opcion
    escribirAmarillo("Presione ENTRAR para continuar");
    $tecla = trim(fgets(STDIN));
    if ($tecla != 9999) {
      $opcion = 0;
    }
    return $opcion;
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
        break;
      }
      $indice ++;
    }
    return $palabraUtilizada;
}

?>