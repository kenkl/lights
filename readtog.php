<?php
# Let's crank up, conditionally, the lights at the north-end of the living room. 2 downlights, the end-table, and 3
# bulbs in the tall dragonfly. 
include 'functions.php';
$dl1 = 22; #ambiance only
$dl2 = 23; #ambiance only
$huelights = array(12,13,14,15); # HS-capable lights. Let's save HueState for these, just in case they're in SP2 mode (or some other colour) already.

if(!checkState($dl1)) { # Key on the first DL. If it's not in-progress, assume none of the others are. (this is step 1)
    saveCTState($dl1);
    saveCTState($dl2);
    foreach($huelights as $id) {
        saveHueState($id);
    }
    
    # Now that they're all saved, let's shift 'em... 
    oneOnSpotWarm($dl1);
    oneOnSpotWarm($dl2);
    foreach($huelights as $id) {
        oneOnSpotWarm($id);
    }
}
elseif(getCTState($dl1) === $ctWarm) { # we're already in read-mode with warm downlights (from step 1 above)
    oneOnSpotCool($dl1);
    oneOnSpotCool($dl2);
    foreach($huelights as $id) {
        oneOnSpotCool($id);
    }

} 
else { # we'll only get here if the downlights are $ctCool (not warm), so let's restore the previous state
    restoreState($dl1);
    restoreState($dl2);
    foreach($huelights as $id) {
        restoreState($id);
    }
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['readtog.php']);
?>