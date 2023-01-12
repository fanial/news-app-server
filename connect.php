<?php

    $connect = mysqli_connect("localhost", "root", "", "news_app");
    if (!$connect) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
    