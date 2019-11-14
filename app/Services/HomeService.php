<?php

namespace App\Services;

use Carbon\Carbon;

class HomeService
{
    /**
     * En esta función se aplican las validaciones de pico y placa
     * según las siguientes validaciones vigentes en el año 2018
     * 
     * El horario donde se aplica el pico y placa es:
     * Mañana: 7:00 am - 9:30 am
     * Tarde - Noche: 16:00 - 19:30
     * 
     * Restricciones según último dígito de la placa (Autos y motos):
     * Lunes: 1 y 2
     * Martes: 3 y 4
     * Miércoles: 5 y 6
     * Jueves: 7 y 8
     * Viernes: 9 y 0
     * 
     * @param [String] $fecha
     * @param [String] $placa
     * @return bool
     */
    public function comprobarPicoPlaca(String $fecha, String $placa)
    {
        // Creo una instancia de fecha para poder procesarla
        $fecha_nueva = Carbon::parse($fecha)->locale("ec")->setTimezone('America/Guayaquil');
        // Obtengo el día de la semana a la que corresponde la fecha seleccionada
        $dia_semana = $fecha_nueva->dayOfWeek;
        $tiempo = explode(":", $fecha_nueva->toTimeString('minutes'));
        $hora_a_procesar = $tiempo[0] . $tiempo[1];
        // Si no esta dentro del horario permitido y esta dentro de los días de control
        if (!$this->estaDentroDeHorarioPermitido((int) $hora_a_procesar) && $dia_semana <= 5) {
            // Obtengo el útlimo dígito de la placa recivida
            $ultimo_digito_placa = $placa[strlen($placa) - 1];
            // Aplico la regla establecida para Pico y Placa y respondo con falso si no puede circular
            return !$this->aplicarPicoYPlaca($dia_semana, $ultimo_digito_placa);
        };
        
        return true;
    }

    public function estaDentroDeHorarioPermitido($tiempo)
    {
        // Se verifica si esta dentro del horario de control
        return !(($tiempo > 700 && $tiempo < 930) || ($tiempo > 1600 && $tiempo < 1930));
    }

    public function aplicarPicoYPlaca($dia, $ultimo_digito)
    {
        switch ($dia) {
            case Carbon::MONDAY:
                return $ultimo_digito == 1 || $ultimo_digito == 2;
                break;
            case Carbon::TUESDAY:
                return $ultimo_digito == 3 || $ultimo_digito == 4;
                break;
            case Carbon::WEDNESDAY:
                return $ultimo_digito == 5 || $ultimo_digito == 6;
                break;
            case Carbon::THURSDAY:
                return $ultimo_digito == 7 || $ultimo_digito == 8;
                break;
            case Carbon::FRIDAY:
                return $ultimo_digito == 9 || $ultimo_digito == 0;
                break;
            default:
                return false;
        }
    }
}
