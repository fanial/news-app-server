<?php

require "../news-app/connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    //Menanyimpan data dari inputan
    $title = $_POST['title'];
    $content = $_POST['content'];
    $desc = $_POST['description'];
    $id_user = $_POST['id_user'];
    //input image
    $image = date('dmYHis').str_replace(" ","", basename($_FILES['image']['name']));
    $imagePath = "image/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    //memasukan data ke tabel
    $insert = mysqli_query($connect, "INSERT INTO tb_news VALUE('','$image', '$title', '$content', '$desc', NOW(), '$id_user')");
    if ($insert) {
        $response['value'] = 1;
        $response['message'] = "Add News Successfully";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Add News Failed";
        echo json_encode($response);
    }

}