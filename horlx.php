<?php
include 'functions.php';
$lightlist = array(21,3,19);

oneOff(18); # Not sure if this needs to be on or off here. Let's experiment...
foreach($lightlist as $id){
    oneOnRelax($id);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hoon.php']);
?>

