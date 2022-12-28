<?php

namespace utils;

class DateUtils {

    static function getMonthStr($monthNb){
        $months = ["01" => "janvier", "02" => "février", "03" => "mars", "04" => "avril", "05" => "mai", "06" => "juin", "07" => "juillet", "08" => "août", "09" => "septembre", "10" => "octobre", "11" => "novembre", "12" => "décembre"];
        return $months[$monthNb];
    }

    static function convertMillisToDateStr($millis){
        return date('d', $millis) .' '. self::getMonthStr(date('m', $millis)) .' '. date('Y', $millis);
    }

    static function convertSecondsToHoursMinutes($seconds){
        $secs = $seconds % 60;
        $hrs = $seconds / 60;
        $mins = $hrs % 60;
        $hrs = $hrs / 60;
        return (int)$hrs . "h" . (int)$mins;
    }

}