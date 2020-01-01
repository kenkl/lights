<?php
require 'functions.php';
# A multi-stage button to cycle through living room modes
$lrfronton = ison(11);  # check the state of the LR Front Light. Only care if it's on or not
$lrdlon = ison(25); # check whether the marker DL is on.
$lrdlbri = getBri(25); # get its brightness too.

if(!($lrfronton)) { # 11 is LRFRONT - off is a marker that they all are
    doThing("normal.php?fulldl");
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but6.php']); # just in case we're using iUI
    exit(0);
}
elseif($lrfronton && ($lrdlon && $lrdlbri === 254)) { # we're in normal with fulldl
    doThing("normal.php");
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but6.php']); # just in case we're using iUI
    exit(0);
}
elseif($lrfronton && ($lrdlon && $lrdlbri === 127)) { # we're in normal with half DLs
    doThing("loft_teevee.php");
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but6.php']); # just in case we're using iUI
    exit(0);
}
elseif($lrfronton && ($lrdlon && $lrdlbri === 1)) { # we're in teevee mode
    doThing("cinema.php");
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but6.php']); # just in case we're using iUI
    exit(0);
}
elseif($lrfronton && !($lrdlon)) { # we're in cinema (or SP2) mode.
    doThing("alloff.php?id=L");
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but6.php']); # just in case we're using iUI
    exit(0);
}
else { # Unknown/nonstandard state is in place if all those missed.
    echo "LOLWTF?\n";
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['but6.php']); # just in case we're using iUI
    exit(1);
}

?>
