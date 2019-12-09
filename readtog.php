<?php
// Let's crank up, conditionally, the lights at the north-end of the living room. 2 downlights, the end-table, and 3
// bulbs in the tall dragonfly. 
include 'functions.php';
$dl1 = 22; //ambiance only
$dl2 = 23; //ambiance only
$et1 = 12; //end-table - Hue
$df1 = 13; //tall dragonfly lamp 1 - Hue
$df2 = 14; 
$df3 = 15;

// First, the downlights...
if (restoreState($dl1)) {
    // Restore done.
}
else {
    saveCTState($dl1);
    oneOnSpotCool($dl1);
}
if (restoreState($dl2)) {
    // Restore done.
}
else {
    saveCTState($dl2);
    oneOnSpotCool($dl2);
}

// Next, the end-table light. Probably not critical (I'm usually at the east end, but whatever, man)
if (restoreState($et1)) {
    // Restore done.
}
else {
    saveHueState($et1);
    oneOnBright($et1);
}

// Finally, the 3 bulbs in the tall dragonfly floor lamp.
if (restoreState($df1)) {
    // Restore done.
}
else {
    saveHueState($df1);
    oneOnBright($df1);
}
if (restoreState($df2)) {
    // Restore done.
}
else {
    saveHueState($df2);
    oneOnBright($df2);
}
if (restoreState($df3)) {
    // Restore done.
}
else {
    saveHueState($df3);
    oneOnBright($df3);
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['readtog.php']);
?>