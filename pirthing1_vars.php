<?php
$tl1 = 30; # target lamp. 
$st = 2114; # start time for activation
$et = 420; # end time for activation

date_default_timezone_set('America/New_York');  # Default is UTC. That's not super-useful here.
$nowtime = (int)date('Gi', time()); 
$nowdow = (int)date('w',time()); # 0 - 6, 0=Sunday, 6=Saturday

function activetime() { # Simply return TRUE or FALSE based on the time/dow and whether we should activate
    $st1 = 2114; # start time for activation on weekdays (primary schedule)
    $st2 = 2114; # start time for activation on weekends (secondary schedule)
    $et1 = 420; # end time for activation on weekdays (primary schedule)
    $et2 = 629; # end time for activation on weekends (secondary schedule)
    date_default_timezone_set('America/New_York');  # Default is UTC. That's not super-useful here.
    $nowtime = (int)date('Gi', time()); 
    $nowdow = (int)date('w',time()); # 0 - 6, 0=Sunday, 6=Saturday

    if($nowdow >= 1 && $nowdow <= 5) { # Weekday (primary) schedule
        if(($nowtime >= $st1 && $nowtime <= 2359) || ($nowtime >= 0000 && $nowtime <= $et1) ) {
            return TRUE;
        }
        return FALSE;
    }
    else { # Weekend (secondary) schedule. 
        if(($nowtime >= $st2 && $nowtime <= 2359) || ($nowtime >= 0000 && $nowtime <= $et2) ) {
            return TRUE;
        }
        return FALSE;
    }
}
?>
