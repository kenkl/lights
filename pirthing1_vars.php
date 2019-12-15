<?php
$tl1 = 30; # target lamp. 
$st = 2114; # start time for activation
$et = 420; # end time for activation

date_default_timezone_set('America/New_York');  # Default is UTC. That's not super-useful here.
$nowtime = (int)date('Gi', time()); 

?>
