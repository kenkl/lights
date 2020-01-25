<?php
include 'functions.php';
$lightlist = array(21,3,19);
$lvl = $_GET['lvl'];
if(isset ($lvl)) {
    # If we're setting these dim, be sensitive to that with the little simple (non Hue) lamp.
    if($lvl > 127) oneOn(18);
    else oneOff(18);

    foreach($lightlist as $id){
        setHSState('true',$id,$lvl,7676,143);
    }
} else {
    oneOn(18);
    foreach($lightlist as $id){
        oneOnBright($id);
    }
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hoon.php']);
?>

