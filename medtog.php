<?php
// Toggling the lights in the meditation corner with one button.
include 'functions.php';
$lamp1 = 9; // Just on/off, please
$lamp2 = 33; // Hue capable. Do that.

// First, the Shrine Lamp ($lamp1)
if (restoreState($lamp1)) {
    // Restore state worked. Nothing more to do here?
}
else {
    saveOnState($lamp1);
    oneOn($lamp1);
}

// Then, the downlight ($lamp2)...
if (restoreState($lamp2)) {
    // Restored. Done
}
else {
    saveHueState($lamp2);
    // Todo: make this a multi-mode toggle? Sometimes I like it warm, sometimes
    // cool; it'd be nice to toggle these on-the-fly.
    oneOnSpotWarm($lamp2);
    //oneOnSpotCool($lamp2);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['medtog.php']);
?>

