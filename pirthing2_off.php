<?php
include 'functions.php';
include 'pirthing2_vars.php';

if(checkState($tl1))  restoreState($tl1);  # Make sure a state-file exists before trying to restore it. 
if(checkState($tl2))  restoreState($tl2);  # Make sure a state-file exists before trying to restore it. 

?>

