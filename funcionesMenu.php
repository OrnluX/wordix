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

  ?>