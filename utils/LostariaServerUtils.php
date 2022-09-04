<?php

namespace utils;

class LostariaServerUtils
{

	public static function getOnlinePlayersCount()
	{
		$filename = "/srv/MinecraftServer/commons/servers/Lostaria.yml";
		$file = fopen($filename, "r");
		$filesize = filesize($filename);
		$filetext = fread($file, $filesize);
		fclose($file);
		return substr_count($filetext, "-");
	}

	public static function getOnlinePlayers()
	{
		//$filename = "/srv/MinecraftServer/commons/servers/Lostaria.yml";
		$filename = "C:/Users/LOMBA/Desktop/Lostaria.yml";
		$file = fopen($filename, "r");
		$filetext = fread($file, filesize($filename));
		fclose($file);
		$players = explode("-", $filetext);
		array_shift($players);
		$lastElement = explode('phase:', end($players))[0];
		array_pop($players);
		array_push($players, $lastElement);
		return array_map(function ($player) {
			return trim($player);
		}, $players);
	}
}
