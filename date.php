<?php

    $first=date_create(date("o-m-d"));
    $second=date_create("2020-1-1");
    $diff=date_diff($first,$second);
echo $diff->format("%a jours");

    //print_r(differencedate($datej,$dated));

?>