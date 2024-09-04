<?php
/**
 * Plugin Name: Horarios
 * Description: Añade el shortcode [horarios horario="lunes: ...; martes: ...; ..."]
 * Version: 1.0
 * Author: Maca-chan
 * Author URI: https://maca-chan.site
 */

function horarios($atts){
    /* 
    formato de la entrada: str del tipo:
            "lunes: ...; martes: ...;..."    
    */
    
    $arrayhorarios = explode(";", $atts['horario']);
    
    $horas = array();
    
    foreach ($arrayhorarios as $day) {
        $day_info = explode(":", $day);
        $dayweek = str_replace(' ', '', ucwords(strtolower($day_info[0])));
        $hours = $day_info[1];
        $horas[$dayweek] = $hours;
    }

    
    $dia_actual = date('l');
    
    
    if ($dia_actual == "Monday") {$today =  "Lunes"; $tomorrow="Martes";}
    else{
        if ($dia_actual == "Tuesday") {$today =  "Martes";$tomorrow="Miércoles";}
        else{
            if ($dia_actual == "Wednesday") {$today =  "Miércoles";$tomorrow="Jueves";}
            else{
                if ($dia_actual == "Thursday") {$today =  "Jueves";$tomorrow="Viernes";}
                else{
                    if ($dia_actual == "Friday") {$today =  "Viernes";$tomorrow="Sábado";}
                    else{
                        if ($dia_actual == "Saturday") {$today =  "Sábado";$tomorrow="Domingo";}
                        else {$today =  "Domingo";$tomorrow="Lunes";}}}}}}
    
    
    
    echo "<p id='today'>HOY ABRE:".strtoupper($horas[$today])."</p><p id='tomorrow'>MAÑANA ABRE:".strtoupper($horas[$tomorrow])."</p>";
}

add_shortcode('horarios', 'horarios');
?>