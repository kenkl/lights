
<?php
require 'functions.php';

# Bring the lights down low
oneState('true',11,39,8402,140);
oneState('true',12,39,8402,140);
oneState('true',13,39,8402,140);
oneState('true',14,39,8402,140);
oneState('true',15,39,8402,140);
oneOn(17);
oneOn(20);
$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/lrdloff.php`;

# ...and then bring the bedroom down a bit too, but only if  it's not already dimmed or whatever
if(isOn(9)) {
  $output = `/usr/bin/env curl -s http://max.kenkl.org/lights/brmin.php`;
}

# Let's turn off xmastreething to fit the scene
#$output = `/usr/bin/env curl -s http://max.kenkl.org/lights/xmastreeoff.php`;

# Ironically, turn off the TV backlights if they're on. This will have no effect if we're streaming.
oneOff(28);
oneOff(29);
oneOff(39);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['cinema.php']);

?>
