<?php
require 'koneksi.php';
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result)>0){
    header("Location: index.php");
}else{
    echo '<script>alert("Username dan Password tidak sesuai, silahkan login kembali.");</script>';
}
?>