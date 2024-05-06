<?php

    require "../lib/PSHDP/simple_html_dom.php";

    $currencies =array();
    require "./bcv.php";
    require "./cop.php";
    $fecha = array("fecha" => date('Y-m-d H:i:s'));
    
    array_push($currencies, $fecha);
    echo json_encode($currencies);