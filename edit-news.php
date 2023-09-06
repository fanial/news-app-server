<?php

require "../news-app/connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    //Menanyimpan data dari inputan
    $title = $_POST['title'];
    $content = $_POST['content'];
    $desc = $_POST['description'];
    $id_news = $_POST['id_news'];
    //input image
    $image = date('dmYHis').str_replace(" ","", basename($_FILES['image']['name']));
    $imagePath = "image/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    //memasukan data ke tabel
    $insert = mysqli_query($connect, "UPDATE tb_news SET image='$image', title='$title', content='$content', description='$desc' WHERE id_news='$id_news'");
    if ($insert) {
        $response['value'] = 1;
        $response['message'] = "Edit News Successfully";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Edit News Failed";
        echo json_encode($response);
    }

}