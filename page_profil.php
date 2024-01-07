<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Profil</title>

    <link rel="stylesheet" href="css\front_page.css">
</head>

<body>
    <p id="first_name">Imie</p>
    <p id="surname">Nazwisko</p>
    <p id="number">Numer kontaktowy</p>
    <p id="email">e-mail</p>

    <?php
        session_start();
        if ($_SESSION["uprawnienia"] == 3){

        echo "<form action=\"delete_account.php\" method=\"post\">";
        echo "<input type=\"submit\" name=\"delete_account\" value=\"Usuń Konto\">";
        echo "</form>";
        }

        include('db_config.php');

        /*$servername = "sql104.byethost11.com";
        $username = "b11_35479412";
        $password = 'Llellb565634$gh';
        $dbname = 'b11_35479412_eee';*/
        
        /*$servername = "127.0.0.1:3306";
        $username = "root";
        $password = 'Llellb565634$gh';
        $dbname = 'database_name';*/

        $conn = new mysqli($servername, $username, $password);
            
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  

        mysqli_select_db($conn, $dbname);

        $query = "SELECT * FROM Konta WHERE Login = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $query = "SELECT * FROM Klient WHERE ID_Uzytkownika = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $row['id']);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            echo '<script>
                    imie = document.getElementById("first_name");
                    nazw = document.getElementById("surname");
                    number = document.getElementById("number");
                    email = document.getElementById("email");

                    imie.innerHTML = "Imie: " + "' . $row['Imię'] . '";
                    nazw.innerHTML = "Nazwisko: " + "' . $row['Nazwisko'] . '";
                    number.innerHTML = "Numer komórkowy: " + "' . $row['NumerTelefonu'] . '";
                    email.innerHTML = "Email: " + "' . $row['Email'] . '";
                  </script>';
        }
    ?>
    <form action="page_update_password.php"  method="post">
    <input type="submit" name="update_password" value="Zmień Hasło">
    </form>
    <form action="page_dane_osobowe.php"  method="post">
    <input type="submit" name="update_userdata" value="Edytuj Dane Osobowe">
    </form>
    <a href="index.php">Wróć na Główną<a>
</body>
</html>