<?php

    $url = 'https://www.google.com/finance/quote/USD-COP?hl=en';
    stream_context_set_default(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
    $html = file_get_contents($url);

    $dom = new simple_html_dom();
    $dom->load($html);
    $copValue = $dom->find(".kf1m0 > .YMlKec")[0]->innertext;

    $valor = array(
        "nombre" => "Google Finance",
        "dupla" => "USDCOP",
        "fuente" => array(
            "nombre" => "Google COP",
            "valor" => $copValue
        )
    );

    array_push($currencies, $valor);