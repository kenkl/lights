<?php
require 'functions.php';
# Let's have a single-button, 3-stage toggle for all the downlights. This'll misbehave if there are any stateful toggles
# in progress, leaving unfinished statefiles. Q: is this a practical concern, really? We'll find out, I guess.
# Steps: 1-On full warm, 2-On full cool, 3-previous state for each.

# The array has all all the downlights, but we'll key on just one of them
$lightlist = array(6,7,8,22,23,24,25,30,31,32);
$kdl = 8; # Key DownLight - the presence of an in-progress stateful toggle. In practice, this one rarely/never will...

if(!checkState($kdl)) { # using the kdl to determine if *this* script is in progress 
    foreach($lightlist as $id) { # Step 1 - save state, set all to full warm
        saveCTState($id);
        oneOnSpotWarm($id);
    }
}
elseif(checkState($kdl) && (getCTState($kdl) === $ctWarm)) {
 # check that our key has a statefile, and is set to warm. Step 2 - switch all to full cool
    foreach($lightlist as $id) {
        oneOnSpotCool($id);
    }
}
else {
    foreach($lightlist as $id) { # Step 3 - restore previous state
        restoreState($id);
    }
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit'))  header('Location: ' . $_SERVER['alldltog.php']);
?>
