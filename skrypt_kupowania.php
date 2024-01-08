<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['oferta_id'])) {
    $oferta_id = $_GET['oferta_id'];

    // Tutaj możesz przeprowadzić proces zakupu
    // na podstawie $oferta_id
    // np. aktualizacja bazy danych, potwierdzenie zakupu, itp.

    $oferta_id = $_GET['oferta_id'];
    $user_id = $_SESSION["id"];

    include('db_config.php');

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    // Zapytanie SQL
    $query = "INSERT INTO zakupione_wycieczki (user_id, oferta_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $oferta_id);
    if ($stmt->execute()){
        echo "yay";
        echo '<script>
        window.location.href = "page_oferty.php";
        </script>';
    }

    

}
?>