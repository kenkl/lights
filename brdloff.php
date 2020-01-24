
<?php
include 'functions.php';

for($id = 30; $id <=33; $id++) {
  oneOff($id);
}


if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brdloff.php']);

?>
