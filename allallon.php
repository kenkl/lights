
<?php
include 'functions.php';

$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brhalf.php`;
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/normal.php`;
#$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/kdlonfullwarm.php`;
#$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/kdl50.php`;
#$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/hoon.php`;

# Kitchen downlights
for($id = 6; $id <=8; $id++) {
  oneOn($id);
  setCT($id, 400);
  setLevel($id, 127);
}

# clear any dangling toggles that were in use...
clearStates();

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['allallon.php']);

?>

