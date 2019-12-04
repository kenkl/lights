<?php
include 'functions.php';
$id = 11;
if (restoreState($id)) {
    echo "state restored. we're done here.\n";
}
else {
    saveHueState($id);
    onFullRed($id);
    usleep(500000);
    onFullGreen($id);
    usleep(500000);
    onFullBlue($id);
    usleep(500000);
    onFullRed($id);
}
?>
