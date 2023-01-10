<?php

require "../news-app/connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    //Menanyimpan data dari inputan
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    
    //memeriksa data akun yang tersedia 
    $cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$username' AND email='$email'"));
    if($cek > 0){
        $response['value'] = 2;
        $response['message'] = "Username or Email already in use";
        echo json_encode($response);
    }else{
    //memasukan data ke tabel user
    $regist = mysqli_query($connect, "INSERT INTO tb_user VALUE('','$username', '$email', '$pass', '1', NOW())");
        if ($regist) {
            $response['value'] = 1;
            $response['message'] = "Register Successfully";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Register Failed";
            echo json_encode($response);
        }
    }

}