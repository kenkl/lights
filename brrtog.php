<?php
// Bedroom reading light toggle to full brightness 
include 'functions.php';
$brread = 5; 

if (restoreState($brread)) {
    // Restored. Done
}
else {
    saveHueState($brread);
    oneOnSpotWarm($brread);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brrtog.php']);
?>
