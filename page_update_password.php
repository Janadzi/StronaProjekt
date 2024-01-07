<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="css\login_register_page.css">
</head>
<body>

    <form name="update_password" id="reg" method="post">
    <div id="content">
        <p>Stare Hasło: </p>
        <input type="password" name="old_password" id="old_pass">
        <p>Nowe Hasło:</p>
        <input type="password" name="password" id="pass">
        <p>Powtórz Hasło:</p>
        <input type="password" name="password_repeat" id="repeat"> <br>
            
        <p id="wrong" style="display: none">Hasła muszą być takie same</p>
        <p id="login_used" style="display: none">Wpisany login jest już w użyciu</p>

        <input type="submit" value="Zmień Hasło">
        <script src="javascript\check_passwords.js"></script>
    </form>
        <hr>
        <a href="index.php">Wróć na Główną</a><br>
    </div>
    <script src="javascript\check_passwords.js"></script>

    <?php
        $post_set = isset($_POST['old_password']) && isset($_POST['password']) && isset($_POST['password_repeat']);
        
        
         if($post_set){
            if( $_POST['password'] == $_POST['password_repeat']){
            session_start();
            

            $servername = "sql104.byethost11.com";
            $username = "b11_35479412";
            $password = 'Llellb565634$gh';
            $dbname = 'b11_35479412_eee';

            /*$servername = "127.0.0.1:3306";
            $username = "root";
            $password = 'Llellb565634$gh';
            $dbname = 'database_name';*/


            $user = $_SESSION["username"];
            $old_pass = $_POST['old_password'];

            $conn = new mysqli($servername, $username, $password);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            mysqli_select_db($conn, $dbname);

            $query = "SELECT * FROM Konta WHERE Login = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1){
            $row = $result->fetch_assoc();

        
            if (password_verify($old_pass, $row["Haslo"])){
                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $query = "UPDATE Konta SET Haslo = ? WHERE Login = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $hashedPassword, $user);
                $stmt->execute();
                echo "Poprawna zmiana hasła";
                echo '<script>
                        window.location.href = "index.php";
                    </script>';
            }

             
         }
         $stmt->close();
        $conn->close();
         }
         }


    ?>
</body>