<?php
// Clear dangling state files from /tmp. This should probably not be run manually - doing so will break toggles that are
// in use. This can live in a 2am cronjob, and probably in the allallon/allalloff unconditional scripts. Calling it
// manually is probably a hail-mary diagnostic action.
array_map('unlink', glob("/tmp/lights.*.state"));
?>
