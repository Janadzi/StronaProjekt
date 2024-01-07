var input = document.getElementById("nazwa");

input.onchange = function(){
    option()
}

function option(){
    var selected = input.options[input.selectedIndex].value;
    var divider = document.getElementById("hor_line");

    var formy = [];
    var opcje = ["dodaj_pracownika", "usun_pracownika", "dodaj_oferte", "usun_oferte", "wybor"];

    formy.push(document.getElementById("dodawanie_pracownika"));
    formy.push(document.getElementById("usuwanie_pracownika"));
    formy.push(document.getElementById("dodawanie_oferty"));
    formy.push(document.getElementById("usuwanie_oferty"));

    for(let i = 0; i < 4; i++){
        if(selected == opcje[i]){
            formy[i].style.display = 'block';
        } else {
            formy[i].style.display = 'none';
        }
    }

    if(selected != opcje[4]){
        divider.style.display = 'block';
    } else {
        divider.style.display = 'none';
    }
}