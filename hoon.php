<?php
include 'functions.php';
$lightlist = array(21,3,19,38);
$lvl = $_GET['lvl'];
if(isset ($lvl)) {
    # If we're setting these dim, be sensitive to that with the little simple (non Hue) lamp.
    if($lvl > 127) oneOn(18);
    else {
        oneOff(18);
        oneOff(37);  # If we're going dim, let's turn this on off
    }
    

    foreach($lightlist as $id){
        setHSState('true',$id,$lvl,7676,143);
    }
} else {
    oneOn(18);
    foreach($lightlist as $id){
            setHSState('true',$id,254,7676,143);
    }
    # Not liking the full-brightness of what is now the monitor backlight
    setLevel(3,128);
    setLevel(19,128);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hoon.php']);
?>

