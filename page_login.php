<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css\login_register_page.css">
</head>
    <?php
    session_start();
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo '<script>
                    window.location.href = "index.php";
                </script>';
        }
    ?>

    <div id="content">
        <form method="post">
            <p>Login:</p> <input type="text" name="login"><br>
            <p>Hasło:</p> <input type="password" name="password"><br>

            <input type="submit" value="Zaloguj się"> 
        </form>
        <hr>

        <a href="index.php">Wróć na Główną<a>
    </div>

    <?php    
    if(isset($_POST['login']) && isset($_POST['password'])){    
        session_start();

        include('db_config.php');

    
        // Create connection
        $conn = new mysqli($servername, $username, $password);
    
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $input_user = $_POST['login'];
        $input_passw = $_POST['password'];

        mysqli_select_db($conn, $dbname);

        $query = "SELECT * FROM Konta WHERE Login = ?";
        $stmt = $conn->prepare($query);

        if($input_user != "" && $input_passw != "") {
            $user = $input_user;
            $passw = $input_passw;
            $stmt->bind_param("s", $user);
        }

        $stmt->bind_param("s", $user);
        $stmt->execute();

        $result = $stmt->get_result();

        
         if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if (password_verify($passw, $row["Haslo"])){
                    // Passwords match - proceed with login
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["Login"]; 
                    $_SESSION["uprawnienia"] = $row["Przywilej"]; 
                    echo '<script>
                        window.location.href = "index.php";
                    </script>';
                    exit;
                } else {
                    echo "Wrong password for user: " . $user;
                }
            } else {
            echo "No user " . $user;
        }

        $stmt->close();
        $conn->close(); 
    }
    ?>
</body>
</html>