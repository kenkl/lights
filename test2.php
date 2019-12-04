#!/usr/bin/env php
<?php
include 'functions.php';
$restored=restoreState(21);
if($restored){
    echo "State restored.\n";
}
else {
    echo "State NOT restored.\n";
}
?>
