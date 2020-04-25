<?php

    $diff=date_diff(date_create("2020-1-1"),date_create(date("o-m-d")));
echo $diff->format("%a jours");

    //print_r(differencedate($datej,$dated));

?>