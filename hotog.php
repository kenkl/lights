<?php
include 'functions.php';
$lamp1 = 18; // Just on/off, please
$lamp2 = 21; // Hue capable. Do that.

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

header('Location: ' . $_SERVER['hotog.php']);
?>

