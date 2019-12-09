<?php
require 'functions.php';
/* Toggle ALL the downlights to full on (cool). We'll check for an in-progress toggle with only ONE
   of the lights in each room - they're generally set the same, so that should be safe. */
$kdl1 = 6;
$kdl2 = 7;
$kdl3 = 8;
$lrdl1 = 22;
$lrdl2 = 23;
$lrdl3 = 24;
$lrdl4 = 25;
$brdl1 = 30;
$brdl2 = 31;
$brdl3 = 32;
$brdl4 = 33;

//Start with the kitchen...
if (restoreState($kdl1)) {
    restoreState($kdl2);
    restoreState($kdl3);
}
else {
    saveCTState($kdl1);
    saveCTState($kdl2);
    saveCTState($kdl3);
    oneOnSpotCool($kdl1);
    oneOnSpotCool($kdl2);
    oneOnSpotCool($kdl3);
}
// Next, the living room...
if (restoreState($lrdl1)) {
    restoreState($lrdl2);
    restoreState($lrdl3);
    restoreState($lrdl4);
}
else {
    saveCTState($lrdl1);
    saveCTState($lrdl2);
    saveCTState($lrdl3);
    saveCTState($lrdl4);
    oneOnSpotCool($lrdl1);
    oneOnSpotCool($lrdl2);
    oneOnSpotCool($lrdl3);
    oneOnSpotCool($lrdl4);
}
// Finally, the bedroom.
if (restoreState($brdl1)) {
    restoreState($brdl2);
    restoreState($brdl3);
    restoreState($brdl4);
}
else {
    saveHueState($brdl1);
    saveHueState($brdl2);
    saveHueState($brdl3);
    saveHueState($brdl4);
    oneOnSpotCool($brdl1);
    oneOnSpotCool($brdl2);
    oneOnSpotCool($brdl3);
    oneOnSpotCool($brdl4);
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit'))  header('Location: ' . $_SERVER['fulldltog.php']);
?>

