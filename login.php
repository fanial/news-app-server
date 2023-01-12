<?php

require "../news-app/connect.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    //Menanyimpan data dari inputan
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    
    $login = mysqli_query($connect, "SELECT * FROM tb_user WHERE email='$email' AND password='$pass'");
    
    //memeriksa data akun yang tersedia 
    $cek = mysqli_num_rows($login);

    //fetch data login
    $data = mysqli_fetch_assoc($login);

    if($cek > 0){
        $response['value'] = 1;
        $response['message'] = "Login Successfully";
        $response['data_user'] = $data;
        echo json_encode($response);
    }else{
        $response['value'] = 0;
        $response['message'] = "Login Failed";
        $response['data_user'] = $data;
        echo json_encode($response);
    }

}