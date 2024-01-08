<link rel="stylesheet" type="text/css" href="css\front_page.css">

<div class="topnav">
    <a href="index.php">Główna</a>
    <a href="page_oferty.php">Oferty</a>
    <a href="#">Kontakt</a>
    <a href="#">Lista Wydziałów</a>

    <?php 
    session_start();
    if(isset($_SESSION["uprawnienia"])){
        if($_SESSION["uprawnienia"] == 1){
            echo '<a href="page_control.php">Zarządzanie</a>';
        }
        else if($_SESSION["uprawnienia"] == 2){
            echo '<a href="page_create_query.php">Stwórz zapytanie</a>';
        }
    }
    ?> 

    <div class="konto">
        <a href="page_login.php" class="show_konto">Konto</a>

        <div class="konto_info">
            <h4 class="konto_przywitanie">Witamy 
                <?php 
                session_start();
                if(isset($_SESSION["username"])){
                    echo $_SESSION["username"] . "<br>";
                    echo "Poziom uprawnień: " . $_SESSION["uprawnienia"];
                } else {
                    echo "Gość";
                }
                ?> 
            </h4>
            <?php
                session_start();

                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    echo '
                    <a href="page_profil.php">Profil</a>
                    <a href="#">Oferty</a>
                    <a href="logout.php">Wyloguj</a>';
                } else {
                    echo '
                    <a href="page_login.php">Zaloguj się</a>
                    <a href="page_register.php">Rejestracja</a>';
                }
            ?>
        </div>
    </div>
    
    <?php include 'searchbar.php'; ?>
</div>

<script src="javascript\show_konto.js"></script>