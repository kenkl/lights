<?php
include 'functions.php';
include 'pirthing2_vars.php';

# Set a couple lights to shift colour temperature...
if(isOn($tl1)) {
	saveHSState($tl1);
	#setHSState('true',$tl1,254,4364,217);
	setHS($tl1, 4364, 217);
}
if(isOn($tl2)) {
	saveHSState($tl2);
	#setHSState('true',$tl2,254,4364,217);
	setHS($tl2, 4364, 217);
}

# ...and then signal via AIO...
setToggle("catpee" ,1);

?>
