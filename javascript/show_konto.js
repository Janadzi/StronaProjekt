const konto_window = document.getElementsByClassName("konto_info");
const konto_a = document.getElementsByClassName("show_konto");

konto_a[0].addEventListener("mouseover", function(){
    konto_window[0].style.display = 'block';

    konto_window[0].addEventListener("mouseover", function(){
        konto_window[0].style.display = 'block';
    })
})

konto_a[0].addEventListener("mouseout", function(){
    konto_window[0].style.display = 'none'

    konto_window[0].addEventListener("mouseout", function(){
        konto_window[0].style.display = 'none';
    })
})