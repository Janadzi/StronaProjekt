<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Oferty</title>

    <link rel="stylesheet" href="css/front_page.css">
</head>

<body>
    <script>
        var id = Number(sessionStorage.getItem("id_oferta"));
        var formSubmitted = sessionStorage.getItem("form_submitted");

        if(formSubmitted == "false"){
            var form = document.createElement("form");
            var input = document.createElement("input");

            input.style.display = 'none';
            form.style.display = 'none';

            form.method = "post";

            input.type = "text";
            input.name = "id_oferty";
            input.value = String(id);

            form.appendChild(input);
            document.body.appendChild(form);

            form.addEventListener("submit", function(event) {
                event.preventDefault();
            });

            form.submit();
            sessionStorage.setItem("form_submitted", true);
        }

    </script>

    <?php include 'navbar.php'; ?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = 'janadzi2023<<';
    $dbname = 'projekt';

    /*$servername = "127.0.0.1:3306";
    $username = "root";
    $password = 'Llellb565634$gh';
    $dbname = 'b11_35479412_eee';   */ 

// Tworzenie połączenia
    $id_oferta = intval($_POST['id_oferty']);
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    // Zapytanie SQL
    $sql = "SELECT * FROM oferta WHERE Id_Oferty = ?";
    $sql = $conn->prepare($sql);
    $sql->bind_param("i", $id_oferta);
    $sql->execute();

    // Wykonanie zapytania
    $result = $sql->get_result();

    // Sprawdzenie czy wynik istnieje i wyświetlenie danych
    if ($result->num_rows > 0) {
        session_start();
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