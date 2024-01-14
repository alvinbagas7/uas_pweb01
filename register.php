<?php
require 'koneksi.php';
$fullname = $_POST["nama"];
$username = $_POST["panggilan"];
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "INSERT INTO user (nama, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";

if(mysqli_query($conn, $query_sql)){
    header("Location: login.html");
}else{
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}