<?php

    $connect = new mysqli("localhost", "root", "", "news_app");
    if ($connect) {
        echo "Connection Successfull";
    } else {
        echo "Conneection Failed";
        exit();
    }
    