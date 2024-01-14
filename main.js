    let searchbtn = document.querySelector('.searchbtn');
    let closebtn = document.querySelector('.closebtn');
    let searchbox = document.querySelector('.search-box');
    let menuToggle = document.querySelector('.menuToggle');
    let navigasi = document.querySelector('.navigasi');
    let header = document.querySelector('nav');

    searchbtn.onclick = function(){
        searchbox.classList.add('active');
        closebtn.classList.add('active');
        searchbtn.classList.add('active');
        menuToggle.classList.add('hide');
        header.classList.remove('open');
    }
    closebtn.onclick = function(){
        searchbox.classList.remove('active');
        closebtn.classList.remove('active');
        searchbtn.classList.remove('active');
        menuToggle.classList.remove('hide');
    }
    menuToggle.onclick = function(){
        header.classList.toggle('open');
        searchbox.classList.remove('active');
        closebtn.classList.remove('active');
        searchbtn.classList.remove('active');
    }
    navigasi.onclick = function(){
        header.classList.toggle('open');
        searchbox.classList.remove('active');
        closebtn.classList.remove('active');
        searchbtn.classList.remove('active');
    }


//     document.querySelectorAll('.btnDetail').forEach( item => {
//         item.addEventListener('click',(e) => {
//             let parent = e.target.parentNode.parentNode;
//             let gambar = parent.querySelector('.cover-img').src;
//             let judul = parent.querySelector('.judul').innerHTML;
//             let harga = parent.querySelector('.price').innerHTML;
//             let deskripsi =parent.querySelector('.deskripsi') ? parent.querySelector('.deskripsi').innerHTML : 'Belum Ada Informasi';
            

//             let tombolModal = document.querySelector('.btnModal');
//             tombolModal.click();

//             document.querySelector('.modalTitle').innerHTML = judul;
//             let image = document.createElement('img');
//             image.src = gambar;
//             document.querySelector('.modalImage').innerHTML = '';
//             document.querySelector('.modalImage').appendChild(image);
//             document.querySelector('.modalDeskripsi').innerHTML =deskripsi;
//             document.querySelector('.modalHarga').innerHTML =harga;
            
//             const nohp = '6289501562673';
//             let pesan = `https://api.whatsapp.me/send?phone=${nohp}&text=Halo Bang, saya mau pesan produk ini ${gambar}`;

//             document.querySelector('.btnBeli').href = pesan;
//         });
//     });

//     // Get the modal
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }


