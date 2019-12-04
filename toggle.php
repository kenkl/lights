<?php
include 'functions.php';

$id=$_GET['id'];

if($id){
    toggle($id);
    header('Location: ' . $_SERVER['index.php#_lightlist']);
}
else {
    echo("Missing unit id. RTFM, bitch.\n");
}
?>
