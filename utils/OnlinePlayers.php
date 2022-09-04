<?php
namespace utils;

class OnlinePlayers
{

	public static function getOnlinePlayers()
	{
		$filename = "/srv/MinecraftServer/commons/servers/Lostaria.yml";
		$file = fopen($filename, "r");

		if ($file == false) {
			echo ("Error in opening file");
			exit();
		}

		$filesize = filesize($filename);
		$filetext = fread($file, $filesize);
		fclose($file);
		return substr_count($filetext, "-");
	}
}
