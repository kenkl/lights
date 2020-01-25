<?php
# The home-office work light is not tied to any scenes (yet?), so let's have a simple toggle for it (it's on one of those innr smart-plug things).
include 'functions.php';

if(ison(37)) oneOff(37);
else oneOn(37);

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['howltog.php']);
?>
