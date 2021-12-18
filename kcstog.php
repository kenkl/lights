<?php
# Kitchen Coffee Shop Toggle - setting a scene in the kitchen, using my new bistro table as a coffee shop spot. Playing
# hipster-mode in the comfort of my own home. Ha. 20200126
include 'functions.php';

if(!checkState(8)) { # keyed off the downlight at the far end of the kitchen. its state is rarely saved for anything, so a good check whether we're in progress for toggle-state.
    # we're not in-progress, so let's save states and set the scene
    saveHSState(4);
    saveCTState(6);
    saveCTState(7);
    saveCTState(8);
    saveBriState(34); # Hue filament bulb has no HS or CT properties, but we need Bri (just in case)
    saveOnState(27); # The INNR smart-plug is strictly on/off - no other properties exist
    saveOnState(41); # Fairy lights

    oneOn(27);
    oneOn(41);
    setHSState('true',4,38,7676,199);
    setCTState('true', 6,127,400);
    setCTState('true', 7,254,400);
    setCTState('true', 8,127,400);
    setLevel(34,38);
} else { # we're in-progress, so just restore previous states for these
    $lightlist = array(4,6,7,8,27,34,41);

    foreach($lightlist as $id) {
        restoreState($id);
    }
}
if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['kcstog.php']);
?>


