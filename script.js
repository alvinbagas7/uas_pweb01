
let closebtn = document.querySelector('.closebtn');
let searchbox = document.querySelector('.search-box');
let menuToggle = document.querySelector('.menuToggle');
let navigasi = document.querySelector('.navigasi');
let header = document.querySelector('nav');

closebtn.onclick = function(){
    searchbox.classList.remove('active');
    closebtn.classList.remove('active');
   //  menuToggle.classList.remove('hide');
}
menuToggle.onclick = function(){
    header.classList.toggle('open');
    searchbox.classList.remove('active');
    closebtn.classList.remove('active');
}
navigasi.onclick = function(){
    header.classList.toggle('open');
    searchbox.classList.remove('active');
    closebtn.classList.remove('active');
}
