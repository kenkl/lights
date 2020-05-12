<?php
include 'functions.php';
$lightlist = array(18,21,3,19,37,38);


foreach($lightlist as $id){
	oneOff($id);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hooff.php']);
?>

