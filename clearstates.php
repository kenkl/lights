<?php
// Clear dangling state files from /tmp. This should probably not be run manually - doing so will break toggles that are
// in use. This can live in a 2am cronjob, and probably in the allallon/allalloff unconditional scripts. Calling it
// manually is probably a hail-mary diagnostic action.
require 'functions.php';
clearStates();
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit'))  header('Location: ' . $_SERVER['clearstates.php'])
?>
