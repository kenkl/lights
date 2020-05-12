<?php
include 'functions.php';
$lightlist = array(21,3,19,38);

foreach($lightlist as $id){
	game_on($id);
}

oneOff(18);
oneOff(37);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hogame.php']);
?>

