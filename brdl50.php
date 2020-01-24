
<?php
include 'functions.php';

for($id = 30; $id <=33; $id++) {
  oneOn($id);
  setCT($id, 400);
  setLevel($id, 127);
}

if(strpos($_SERVER['HTTP_USER_AGENT'], 'WebKit')) header('Location: ' . $_SERVER['brdl50.php']);

?>
