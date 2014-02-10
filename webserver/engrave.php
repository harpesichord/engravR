<?php


function engrave($file, $title, $speed)
{
	$command = escapeshellcmd('sudo -i nohup /usr/custom/engravR/laserengraver -f ' . $file . ' -s ' . $speed . ' -t ' . $title . ' > /dev/null &');
	$output = shell_exec($command);
	
}


?>