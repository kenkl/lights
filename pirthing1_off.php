<?php
# A simple, non-conditional script for PIRThing (https://github.com/kenkl/pirthing - coming soon). PIRThing, based on
# MotionNightlight (https://github.com/kenkl/MotionNightlight), is an ESP8266 that has a PIR sensor and will call an on or
# off script here based on its logic/timings. Which unit(s) it affects are then expressed here, letting PIRThing control
# different lights with different behaviours without reflashing PIRThing itself. 
# Lets put time-of-day conditionals here as needed - no point in turning on a nightlight-thing at 15:30.
include 'functions.php';
include 'pirthing1_vars.php';

if(ison($tl1)) { #if it's not already on (this would be odd), let's not do anything.
    # Are we going to honour this trigger? This probably should express a range of times; crossing over 00:00 is going to be A Thing.
    #if(($nowtime >= $st && $nowtime <= 2359) || ($nowtime >= 0000 && $nowtime <= $et) ) { 
    if(activetime()) { 
        echo "{$nowtime} - Do.\n";
        if (checkState($tl1)) {  #we don't actually care about the state, just that it's there
          oneOff($tl1);  # restoreState here will flash (~400ms) the PREVIOUS state. Just turn it off, please.
          clearState($tl1);
        }
        else {
          echo "no statefile found. NOOP.\n";
        }
    }
    else {
        echo "{$nowtime} - Do not.\n";
    }
}
else {
    # light is off. bail.
    echo "light is off. no.\n";

}


?>

