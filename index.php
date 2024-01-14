<?php
    @include 'koneksi.php';

    if(isset($_POST['add_to_cart'])){

        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;
     
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                $quantity=$fetch_cart['quantity'];
                $quantity=$quantity + 1;
                break;}
                $query_update = "UPDATE cart set quantity=$quantity WHERE name='$product_name'";
                if(mysqli_query($conn, $query_update)){
                    // header("Location: index.php");
                    echo '<script>alert("Produk Berhasil Ditambahkan Ke Keranjang");</script>';
                }else{
                    echo "Update quantity gagal: " . mysqli_error($conn);
                }
        }else{
           $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
           echo '<script>alert("Produk Berhasil Ditambahkan Ke Keranjang");</script>';
        }
     
     }
     
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vynn.ThriftStore</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1ac5100e06.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
    <a href="#"class="logo">Vynnn.ThriftShop</a>
    <div class="grup">
        <ul class="navigasi">
            <li><a href="addproduk.php">Add Produk</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#home">Produk Kami</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="login.html">Keluar</a></li>
        </ul>
        <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
        
        <div class="search">
            <span class="icon">
                <ion-icon name="search-outline" class="searchbtn"></ion-icon>
                <ion-icon name="close-outline" class="closebtn"></ion-icon>
            </span>
        </div>
        <div class="iconcart">
                    <a href="cart.php"><ion-icon class="cartbtn" name="cart-outline"></ion-icon><span class="count"><?php echo $row_count; ?></span></a>
            </div>
        <ion-icon name="menu-outline" class="menuToggle"></ion-icon>
    </div> 
    <div class="search-box">
        <input type="text" placeholder="search here...">
    </div>
</nav>
<section class="content">
    <div class="wrapper">
        <div class="slides">
            <span id="slide-1"></span>
            <span id="slide-2"></span>
            <span id="slide-3"></span>
            <span id="slide-4"></span>
            <div class="banner">
                <img src="banner/Nike Discount.jpg">
                <img src="banner/banner2.jpg">
                <img src="banner/banner4.jpeg">
                <img src="banner/banner3.jpg">
            </div> 
        </div>
        <div class="scrol">
            <a href="#slide-1">1</a>
            <a href="#slide-2">2</a>
            <a href="#slide-3">3</a>
            <a href="#slide-4">4</a>
        </div>
    </div>
    <div class="opening" id="home">
        <h1>Koleksi Kami</h1>
        <p>Diskon Up 80% All Item Untuk Hari Ini !</p>
    </div>
    <div class="container">
    
    <h2 class="kategori">Produk Brand Terbaru . . . </h2>
    <div class="card">
       <?php 
        $select_products = mysqli_query($conn, "SELECT * FROM `products`");
        if(mysqli_num_rows($select_products) > 0){
           while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
        <form method="post" action="" >
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" class="cover-img" style="width:100%">
                <h1 class="judul"><?php echo $fetch_product['name']; ?></h1>
                <p class="deskripsi">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed necessitatibus libero voluptatibus impedit aspernatur corrupti voluptates sapiente repudiandae accusantium numquam.</p>
                <p class="price">Rp. <?php echo $fetch_product['price']; ?></p>
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                <input type="submit" class="btnCart" value="add to cart" name="add_to_cart">
            
<!-- <div class="modal-dialog modal-dialog-centered">
<button type="button" class="btnDetail btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Detail
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
</div>                 -->
            </div>
        </form>
        <!-- <button class="btnDetail">Detail</button></p>
     <button id="myBtn" class="btnModal">Open Modal</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h1 class="modalTitle"></h1>
    </div>
    <div class="modal-body">
        <main class="grid-2">
            <div class="col">
                <div class="modalImage"></div>
            </div>
            <div class="col">
                <div class="keterangan">
                <div class="modalDeskripsi"></div>
                <div class="hehe-2">
                    <p class="modalHarga"></p>
                    
                    </div>

                </div>
            </div>
            </div>
        </main>
    </div>
</div> -->
<?php
         };
      };
      ?>
 </div>

</div>


</section>
<section id="about">
    <div class="about-me">
        <img src="images/about-us.png" alt="">
        <div class="about-text">
            <h2>Tentang Kami</h2>
            <h5>Vynn Thrift</span></h5>
            <p>Kami Telah Berdiri Sejak Tahun 2022 yang beralamat di Jalan Kapten Ismail RT 001 RW 001, dan barang yang kami jual sangat berkualitas dari import brand luar negeri yang cukup populer dan kami jual kembali dengan harga pasaran yang murah </p>
            
        </div>
    </div>
</section>
<footer>
    <div class="footer-content">
        <h3>Vynn.ThriftShop</h3>
        <p>Sebagai Pusat Fashion Online di Kota Tegal, kami menciptakan kemungkinan-kemungkinan gaya tanpa batas dengan cara memperluas jangkauan produk, mulai dari produk internasional hingga produk lokal dambaan. Kami menjadikan Anda sebagai pusatnya. Bersama VYNNNTHRIFT.</p>
        <ul class="socials">
            <li><a href="https://web.facebook.com/alvin.bagas.184"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="https://api.whatsapp.com/send?phone=6288224805016"><i class="fa-brands fa-whatsapp"></i></a></li>
            <li><a href="https://www.instagram.com/vynnn.bgsss/"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy;2023 Thrift designed by <span>Alvin Bagas Setiono</span></p>
    </div>
</footer>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="main.js"></script>
</div>
</body>
</html>