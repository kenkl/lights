<?php
include 'functions.php';
include 'pirthing2_vars.php';

# For now, very simple... If it's on, turn it green.
if(isOn($tl1)) {
    saveHSState($tl1);
    onFullGreen($tl1);
}
if(isOn($tl2)) {
    saveHSState($tl2);
    onFullGreen($tl2);
}

?>
