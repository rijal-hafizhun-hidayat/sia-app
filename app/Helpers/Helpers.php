<?php 
    function timeFormat($time){
        return Carbon\Carbon::parse($time)->format('H:i');
    }

?>