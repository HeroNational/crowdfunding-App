<?php

    $diff=date_diff(date_create("2020-9-1"),date_create("2020-8-25"));
echo $diff->format("%a jours");

    //print_r(differencedate($datej,$dated));

?>