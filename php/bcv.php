<?php

    $url = 'https://www.bcv.org.ve/';
    stream_context_set_default(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
    $html = file_get_contents($url);

    $dom = new simple_html_dom();
    $dom->load($html);
    $dolarValue = $dom->find("#dolar strong")[0]->innertext;

    $valor = array(
        "nombre" => "Banco Central de Venezuela",
        "dupla" => "USDVES",
        "fuente" => array(
            "nombre" => "BCV Dollar",
            "valor" => $dolarValue
        )
    );

    array_push($currencies, $valor);