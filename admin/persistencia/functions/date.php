<?php
function getSpanishDate($date, $type)
{
    $date = substr($date, 0, 10);
    $dayNum = date('d', strtotime($date));
    $day = date('l', strtotime($date));
    $month = date('F', strtotime($date));
    $year = date('Y', strtotime($date));
    $days_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $days_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    $dayName = str_replace($days_EN, $days_ES, $day);
    $month_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $month_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $monthName = str_replace($month_EN, $month_ES, $month);
    switch ($type) {
        case 1:
            return $dayName . " " . $dayNum . " de " . $monthName . " de " . $year;
            break;
        case 2:
            return $dayNum . " de " . $monthName . " de " . $year;
            break;
        default:
            return $dayName . " " . $dayNum . " de " . $monthName . " de " . $year;
            break;
    }
}
