
<?php
# Grouping to turn on all the lights, with downlights on full. 
# "Good morning, houseplants. Yes, it's wake-up time."
include 'functions.php';

$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/normal.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brhalf.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/alldlonfullwarm.php`;

# clear any dangling toggles that were in use...
clearStates();

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['allallon.php']);

?>

