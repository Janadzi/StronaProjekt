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
    include('db_config.php');

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
    echo '<table>';
    echo '<tr>
            <th>Nazwa</th>
            <th>Kraj</th>
            <th>Miejscowość</th>
            <th>Cena</th>
            <th>Hotele</th>
            <th>Wycieczki</th>
            <th>Ocena</th>
          </tr>';
    
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row["Nazwa"].'</td>';
        echo '<td>'.$row["Kraj"].'</td>';
        echo '<td>'.$row["Miejscowosc"].'</td>';
        echo '<td>'.$row["Cena"].'</td>';
        echo '<td>'.$row["Hotele"].'</td>';
        echo '<td>'.$row["Wycieczki"].'</td>';
        echo '<td>'.$row["Ocena"].'</td>';
        echo '<td><button onclick="kupOferte('.$row["Id_Oferty"].')">Kup</button></td>'; // Przycisk Kup
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo "Brak danych.";
}
$conn->close();
?>
</body>
</html>