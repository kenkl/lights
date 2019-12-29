<?php
include 'functions.php';
$lvl = $_GET['lvl'];
if(isset ($lvl)) {
    oneOn(18);
    setHSState('true',21,$lvl,7676,143);
} else {
    oneOn(18);
    oneOnBright(21);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['hoon.php']);
?>

