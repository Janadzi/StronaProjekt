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
            } else {
                # Tworzenie konta
                /*
                $servername = "sql104.byethost11.com";
                $username = "b11_35479412";
                $password = 'Llellb565634$gh';
                $dbname = 'b11_35479412_eee';
                */
                $servername = "localhost";
                $username = "root";
                $password = 'janadzi2023<<';
                $dbname = 'projekt';
            
                // Create connection
                $conn = new mysqli($servername, $username, $password);
            
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
        
                mysqli_select_db($conn, $dbname);
                $query = "select Login from Konta";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                
                
                while ($row = $result->fetch_assoc()) {
                    if ($row["Login"] == $input_user){
                        $is_unique = false;
                        break;
                    }
                }
                
                if ($is_unique){
                    $hashedPassword = password_hash($input_passw, PASSWORD_DEFAULT);
                    $query = "INSERT INTO Konta (Login, Haslo, Przywilej) 
                    VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ssi", $input_user, $hashedPassword, $przywilej);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close(); 

                    echo '<script>
                    window.location.href = "page_login.php";
                    </script>';
                }


                
                $stmt->close();
                $conn->close(); 
            }
            
        }
    ?>

    <script src="javascript\check_passwords.js"></script>
</body>