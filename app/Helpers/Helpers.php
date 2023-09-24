<?php 
    function timeFormat($time){
        return Carbon\Carbon::parse($time)->format('H:i');
    }

    function setValRole($role){
        $valRole = [null, 'Admin', 'Guru', 'Siswa'];
        return $valRole[$role];
    }

?>