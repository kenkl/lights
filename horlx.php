<?php
include 'functions.php';
$lightlist = array(21,3,19,38);

oneOff(18);
oneOff(37);
foreach($lightlist as $id){
    oneOnRelax($id);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hoon.php']);
?>

