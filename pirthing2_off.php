<?php
include 'functions.php';
include 'pirthing2_vars.php';

# Restore previous state
if(checkState($tl1))  restoreState($tl1);  # Make sure a state-file exists before trying to restore it. 
if(checkState($tl2))  restoreState($tl2);  # Make sure a state-file exists before trying to restore it. 

# ...and then let AIO know...
setToggle("catpee", 0);

?>

