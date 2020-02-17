﻿<?php
# A simple, non-conditional script for PIRThing (https://github.com/kenkl/pirthing). PIRThing, based on
# MotionNightlight (https://github.com/kenkl/MotionNightlight), is an ESP8266 that has a PIR sensor and will call an on or
# off script here based on its logic/timings. Which unit(s) it affects are then expressed here, letting PIRThing control
# different lights with different behaviours without reflashing PIRThing itself. 
include 'functions.php';
include 'pirthing1_vars.php';

if(!ison($tl1)) { #if it's already on, let's not do anything (conditional changes could be A Thing in else?)
    if(activetime()) { 
        saveHueState($tl1); # Leave a marker that the light is turned on by PIRThing. 
        oneState('true',$tl1,64,0,254);
    }
    else {
        echo "{$nowtime} - Do not.\n";
    }
}
else {
    # light is on. bail.
    echo "light is on. no.\n";

}

# The bathroom nightlight thing.
oneState('true',10,1,0,254);

# AIO hook - track activation behaviour 
setToggle("testtoggle", 1);

?>
