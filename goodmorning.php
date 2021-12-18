
<?php
# Grouping to turn on all the lights, with downlights on full. 
# "Good morning, houseplants. Yes, it's wake-up time."
include 'functions.php';

# First, turn on the living room lights to normal full brightness, except the downlights
$lrlightlist = array(11,12,13,14,15);

foreach ($lrlightlist as $id) {
    oneOnBright($id);
}

oneOn(17);
oneOn(20);

# Then, mimick the brhalf grouping, without the downlights
$brlightlist = array(5,16,36);

foreach ($brlightlist as $id) {
    oneState('true',$id,127,7676,143);
}
oneOn(9);

# The coffee station light should already be on via crontab, but just in case...
setLevel(35,96);

# Make sure the accent group is on (it should already be, but)
doThing('hueaccenton.php');
oneOn(41);

# Finally, bring up all the downlights.
doThing('alldlonfullcool.php');

# clear any dangling toggles that were in use...
clearStates();

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['goodmorning.php']);

?>

