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
            <p>Imię użytkownika: </p>
            <input type="text" name="username" id="user">
            <p>Hasło:</p>
            <input type="password" name="password" id="pass">
            <p>Powtórz Hasło:</p>
            <input type="password" name="password_repeat" id="repeat"> <br>
            
            <p id="wrong" style="display: none">Hasła muszą być takie same</p>
            <p id="login_used" style="display: none">Wpisany login jest już w użyciu</p>

            <input type="submit" value="Zarejestruj się">
        </form>
        <hr>

        <a href="index.php">Wróć na Główną</a><br>
    </div>

    <?php
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_repeat'])){
            $input_user = $_POST['username'];
            $input_passw = $_POST['password'];
            $input_passw_rep = $_POST['password_repeat'];
            $przywilej = 3;
            $is_unique = true;
    
            if($input_user == "" || $input_passw_rep == ""){
                echo "Puste pola";
            } elseif($_POST['password'] != $_POST['password_repeat']){
                echo "Różne hasła";
            } else {
                session_start();
                # Tworzenie konta
                /*$servername = "sql104.byethost11.com";
                $username = "b11_35479412";
                $password = 'Llellb565634$gh';
                $dbname = 'b11_35479412_eee';*/

                $servername = "127.0.0.1:3306";
                $username = "root";
                $password = 'Llellb565634$gh';
                $dbname = 'database_name';
            
                // Create connection
                $conn = new mysqli($servername, $username, $password);
            
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
        
                mysqli_select_db($conn, $dbname);

                $query = "SELECT * FROM Konta WHERE Login = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $input_user);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $is_unique = false;
                    echo "<p>Istnieje użytkownik o takim loginie</p>";
                }
                
                if ($is_unique){
                    $hashedPassword = password_hash($input_passw, PASSWORD_DEFAULT);
                    $query = "INSERT INTO Konta (Login, Haslo, Przywilej) 
                    VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssi", $input_user, $hashedPassword, $przywilej);
                    $stmt->execute();

                    $_SESSION['last_id'] = $conn->insert_id;

                    $stmt->close();
                    $conn->close(); 

                    echo '<script>
                        window.location.href = "page_dane_osobowe.php";
                    </script>';
                }
            }
            
        }
    ?>

    <script src="javascript\check_passwords.js"></script>
</body>