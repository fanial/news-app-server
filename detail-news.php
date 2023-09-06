<?php

require "../news-app/connect.php";
    $response = array();
    $query = mysqli_query($connect, "SELECT a.*, b.username FROM tb_news a LEFT JOIN tb_user b ON a.id_user = b.id_user ORDER BY a.id_user DESC");

    while($loop = mysqli_fetch_array($query)){
        $row["id_news"]=$loop['id_news'];
        $row["image"]=$loop['image'];
        $row["title"]=$loop['title'];
        $row["content"]=$loop['content'];
        $row["description"]=$loop['description'];
        $row["date_news"]=$loop['date_news'];
        $row["username"]=$loop['username'];

        array_push($response, $row);
    }

    echo json_encode($response);
