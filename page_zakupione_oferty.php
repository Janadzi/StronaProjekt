<body>
    <?php include 'navbar.php'; 
    include('db_config.php');

    /*$servername = "127.0.0.1:3306";
    $username = "root";
    $password = 'Llellb565634$gh';
    $dbname = 'b11_35479412_eee';*/    

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
$user_id = $_SESSION["id"];

// Zapytanie SQL
//$sql = "SELECT * FROM zakupione_oferty WHERE user_id=?";
$sql = "SELECT oferta.Id_Oferty, zakupione_oferty.*, oferta.Nazwa, oferta.Kraj, oferta.Miejscowosc, oferta.Cena, oferta.Hotele, oferta.Wycieczki, oferta.Ocena
FROM zakupione_oferty
JOIN oferta ON zakupione_oferty.oferta_id = oferta.Id_Oferty
WHERE zakupione_oferty.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

// Wykonanie zapytania
$result = $stmt->get_result();

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
        echo '<td><button onclick="zobacz_szczegoly('.$row["Id_Oferty"].')">Szczegóły oferty</button></td>'; // przycisk szczegoly
        echo '<td><button onclick="kupOferte('.$row["Id_Oferty"].')">Refund</button></td>'; // Przycisk Kup
    
    
        echo '</tr>';
    }
    
    echo '</table>';

    echo '<script>
            function zobacz_szczegoly(id){
                window.location = "page_oferta_info.php"
                window.sessionStorage.setItem("id_oferta", id)
            }
        </script>';
} else {
    echo "Brak danych.";
}
$conn->close();
?>

    <script>
        sessionStorage.setItem("form_submitted", false);
    </script>
</body>
</html>