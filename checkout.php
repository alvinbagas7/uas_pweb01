<?php

@include 'koneksi.php';
function formatRupiah($angka){
   $rupiah = "Rp " . number_format($angka, 0, ',', '.');
   return $rupiah;
}
if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $prov = $_POST['prov'];
   $kota = $_POST['kota'];
   $desa = $_POST['desa'];
   $jalan = $_POST['jalan'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `pesan`(name, no_telp, email, method, provinsi, kota, desa, jalan, pin_code, total_price) VALUES('$name','$number','$email','$method','$prov','$kota','$desa','$jalan','$pin_code','$price_total')") or die('query failed');
   $delete_cart = mysqli_query($conn, "DELETE FROM `cart`");
   if($cart_query && $detail_query ){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Terima Kasih Telah Berbelanja Di Toko Kami</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ".formatRupiah($price_total)."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$prov.", ".$kota.", ".$desa.", ".$jalan." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*Bayar Ketika Produk Datang*)</p>
         </div>
            <a href='index.php' class='btn'>Lanjutkan Belanja</a>
            
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="produk.css">

</head>
<body>

<nav>
    <a href="index.php"class="logo">Vynn.ThriftShop</a>
    <div class="grup">
        <ul class="navigasi">
            <li><a href="addproduk.php">Add Produk</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#home">Produk Kami</a></li>
            <li><a href="index.php#about">Tentang Kami</a></li>
            <li><a href="login.html">Keluar</a></li>
        </ul>
<ion-icon name="menu-outline" class="menuToggle"></ion-icon>
        <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
</nav>
<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total">Total Bayar: <?= formatRupiah($grand_total); ?></span>

   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Nama Anda</span>
            <input type="text" placeholder="Masukan Nama Anda" name="name" required>
         </div>
         <div class="inputBox">
            <span>Nomor Telepon</span>
            <input type="number" placeholder="masukan Nomor Telepon Anda" name="number" required>
         </div>
         <div class="inputBox">
            <span>E-mail Anda</span>
            <input type="email" placeholder="Masukan E-mail Anda" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on delivery</option>
               <option value="credit card">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Provinsi</span>
            <input type="text" placeholder="e.g. Nama Provinsi." name="prov" required>
         </div>
         <div class="inputBox">
            <span>Kota</span>
            <input type="text" placeholder="e.g. Nama Kota" name="kota" required>
         </div>
         <div class="inputBox">
            <span>Desa</span>
            <input type="text" placeholder="e.g. Nama Desa" name="desa" required>
         </div>
         <div class="inputBox">
            <span>Jalan</span>
            <input type="text" placeholder="e.g. Nama Jalan" name="jalan" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="Pesan Sekarang" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>