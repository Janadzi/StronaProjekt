<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="css\login_register_page.css">
</head>

<body>
    <div id="content">
        <form name="register" id="reg" method="post">
            <p>Imię</p>
            <input type="text" name="name" id="user">

            <p>Nazwisko</p>
            <input type="text" name="surname" id="pass">

            <p>Email</p>
            <input type="text" name="email" id="repeat"> <br>

            <p>Numer komórkowy</p>
            <input type="text" name="number" id="repeat"> <br>

            <input type="submit" value="Zapisz dane">
        </form>
    </div>

    <?php
        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['number'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $number = $_POST['number'];
    
            if($name == "" || $surname == "" || $email == "" || $number == ""){
                echo "Puste pola";
            } else {
                session_start();
                $last_id = $_SESSION["id"];

                $servername = "localhost";
                $username = "root";
                $password = 'janadzi2023<<';
                $dbname = 'projekt';

                /*$servername = "sql104.byethost11.com";
                $username = "b11_35479412";
                $password = 'Llellb565634$gh';
                $dbname = 'b11_35479412_eee';*/

                /*$servername = "127.0.0.1:3306";
                $username = "root";
                $password = 'Llellb565634$gh';
                $dbname = 'database_name';*/
            
                // Create connection
                $conn = new mysqli($servername, $username, $password);
            
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
        
                mysqli_select_db($conn, $dbname);

                $query = "INSERT INTO Klient (Imię, Nazwisko, Email, NumerTelefonu, ID_Uzytkownika) 
                VALUES (?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssi", $name, $surname, $email, $number, $last_id);
                $stmt->execute();
                
                $stmt->close();
                $conn->close(); 

                echo '<script>
                    window.location.href = "page_login.php";
                </script>';
            }
            
        }
    ?>

    <script src="javascript\check_passwords.js"></script>
</body>