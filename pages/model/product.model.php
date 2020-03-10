<?php

    $alert = "";
    $page = $_GET['page'];
    $productcode = $_GET['code'];
    $result = $db->get_all_data("product", "code='".$productcode."'")->fetch_assoc();

    $tons = $result['content'].' tons';
    $gallons = round($tons*140, 2).' gals';
    $liters = round($gallons*3.78541, 2)." L";
    $hectoliters = round($gallons*3.78541/100, 2). " hL";
    $yeast = round(0.26*$liters, 2)."g";
    $goferm = round(0.28*$liters, 2)."g";
    $fermaidK = "-";
    $DAP = "-";
    $tartaric = "-";
    $oak = round(3.3*$tons, 2)."lbs";
    ?>