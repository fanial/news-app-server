<?php

require "../news-app/connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    //Menanyimpan data dari inputan
    $id_news = $_POST['id_news'];
   
    //memasukan data ke tabel
    $delete = mysqli_query($connect, "DELETE FROM tb_news WHERE id_news='$id_news'");
    if ($delete) {
        $response['value'] = 1;
        $response['message'] = "Delete News Successfully";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Delete News Failed";
        echo json_encode($response);
    }

}