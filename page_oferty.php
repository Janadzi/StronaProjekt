<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Oferty</title>

    <link rel="stylesheet" href="front_page.css">
</head>

<body>
    <?php include 'navbar.php'; 
    $servername = "localhost";
$username = "root";
$password = 'janadzi2023<<';
$dbname = 'projekt';

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Zapytanie SQL
$sql = "SELECT * FROM oferta";

// Wykonanie zapytania
$result = $conn->query($sql);

// Sprawdzenie czy wynik istnieje i wyświetlenie danych
if ($result->num_rows > 0) {
    // Wyświetlanie danych dla każdego wiersza
    while($row = $result->fetch_assoc()) {
        echo "Nazwa: " . $row["Nazwa"]. " - Kraj: " . $row["Kraj"]. " - Miejscowosc: " . $row["Miejscowosc"]. " - Cena: " . $row["Cena"]. " - Hotele: " . $row["Hotele"]. " - Wycieczki: " . $row["Wycieczki"]. " - Ocena: " . $row["Ocena"]. "<br>";
    }
} else {
    echo "Brak danych.";
}
$conn->close();
?>
</body>
</html>