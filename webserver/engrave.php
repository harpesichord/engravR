<?php


function engrave($file, $title, $speed)
{
	$command = 'sudo -u root /usr/bin/python2.7 /usr/custom/engravR/laserengraver.py -f ' . $file . ' -s ' . $speed . ' -t "' . $title . '" > /dev/null &';
	$output = shell_exec($command);
}

function validate()
{
	if (!isset($_POST["title"]) and !isset($_POST["speed"]))
		return "Title and Speed are required.";
	if ($_FILES["engraveFile"]["error"] > 0)
		return "There was an error uploading the engraving file.";
	if (substr($_FILES["engraveFile"]["name"], -4) != '.ngc')
		return "The engraving file must be a ngc file format.";
	if ($_POST['title'] == "")
		return "Title must not be empty.";
	if (!is_numeric($_POST["speed"]))
		return "Speed must be a number.";
	if (file_exists("/mnt/media/Pictures/Raspi/" . $title . "/video.h264"))
		return "This title already exists.";
}


?>