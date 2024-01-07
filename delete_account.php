    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>Delete</title>

        <link rel="stylesheet" type="text/css" href="css\login_register_page.css">
    </head>

   
   <div id="content">
        <form method="post">
            <p>Login:</p> <input type="text" name="login"><br>
            <p>Hasło:</p> <input type="password" name="password"><br>

            <input type="submit" value="Potwierdź Dane"> 
        </form>
        <hr>

        <a href="index.php">Wróć na Główną<a>
    </div>
   
   
   <?php
   session_start();
   if ($_SERVER["REQUEST_METHOD"] != "POST" || $_SESSION["uprawnienia"] != 3){
        echo '<script>
            window.location.href = "index.php";
          </script>';
    }      
   
   if(isset($_POST['login']) && isset($_POST['password'])){  
        
        $servername = "sql104.byethost11.com";
        $username = "b11_35479412";
        $password = 'Llellb565634$gh';
        $dbname = 'b11_35479412_eee';

        /*localhost_OLA*/
        /*$servername = "127.0.0.1:3306";
        $username = "root";
        $password = 'Llellb565634$gh';
        $dbname = 'database_name';*/


        $delete = false;

        $conn = new mysqli($servername, $username, $password);

         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        mysqli_select_db($conn, $dbname);

        $input_user = $_POST['login'];
        $input_passw = $_POST['password'];

        if ($input_user == $_SESSION["username"]){
            $query = "SELECT * FROM Konta WHERE Login = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $input_user);
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                if (password_verify($input_passw, $row["Haslo"])){
                    $delete = true;
                    $id_del = $row['id'];
                }
            }
        }

        // Sprawdź, czy żądanie przyszło z formularza usuwania konta
        if ($delete){
            $user_login = $_SESSION["username"];
            
            $query = "DELETE FROM Konta WHERE Login = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $user_login);
            $stmt->execute();

            $query = "DELETE FROM Klient WHERE ID_Uzytkownika = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id_del);
            $stmt->execute();

            echo '<script>
                window.location.href = "logout.php";
            </script>';
        }

   }
    ?>