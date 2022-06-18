<?php

namespace utils;

class MojangUtils {

    static function getUuid($name){
        $query = "https://api.mojang.com/users/profiles/minecraft/" .$name;
        $response = file_get_contents($query);
        $response = json_decode($response, true);
        $targetUuid = $response['id'];
        return $targetUuid;
    }

    static function getDashesUuid($uuid){
        $uuid = str_replace("-", "", $uuid);
        $chars = [];
        for($i = 0; $i < strlen($uuid); $i++){
            array_push($chars, $uuid[$i]);
        }
        $uuidBuilder = "";
        $z = 0;
        for($y = 0; $y < count($chars); $y++){
            if($z == 8 || $z == 13 || $z == 18 || $z == 23){
                $uuidBuilder = $uuidBuilder. '-';
                $y--;
            }else{
                $uuidBuilder = $uuidBuilder . $chars[$y];
            }
            $z++;
        }
        return $uuidBuilder;
    }

}