<?php
# Toggling the lights in the meditation corner with one button.
# Now with multiple colour temperatures!!
include 'functions.php';
$lamp1 = 9; # Just on/off, please
$lamp2 = 33; # Hue capable. Do that.

if(!checkState($lamp2)) { # Let's key this on the downlight
    saveOnState($lamp1);
    saveCTState($lamp2);
    oneOn($lamp1);
    oneOnSpotWarm($lamp2);
    
}
elseif(checkstate($lamp2) && (getCTState($lamp2) == $ctWarm)) {
    # $lamp1 is already on. Leave it alone.
    oneOnSpotCool($lamp2);
}
else {
    restoreState($lamp1);
    restoreState($lamp2);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['medtog.php']);
?>

