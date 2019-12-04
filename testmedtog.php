<?php
// Who's a clever monkey?? Toggling the lights in the meditation corner. On Button would work!
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
    oneOnSpotWarm($lamp2);
}

header('Location: ' . $_SERVER['testmedtog.php']);
?>

