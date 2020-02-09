<?php
require 'functions.php';
# A simple toggle for the two lights in the record-player corner to see better when switching records.

$id1 = 11; # the table lamp
$id2 = 24; # the downlight in that corner

if(!checkstate($id2)) { # keyed on the downlight. 
    saveHSState($id1);
    saveCTState($id2);

    setHSState('true',$id1,254,7676,143);
    setCTState('true',$id2,254,400);
} else { 
    restoreState($id1);
    restoreState($id2);
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['rpctog.php']);
?>