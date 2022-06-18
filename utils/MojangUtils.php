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

}