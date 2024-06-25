<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        echo 0;
    }
    else{
        echo 1;
    }
    