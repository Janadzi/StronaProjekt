<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css\login_register_page.css">
</head>

<body>
    <div id="content">
        <form method="post" id="form_query">
            <p>Podaj rodzaj zapytania</p>

            <select name="nazwa" id="nazwa">
                <option value="wybor">Wybierz opcję</option>
                <option value="dodaj_pracownika">Dodaj nowego pracownika</option>
                <option value="usun_pracownika">Usuń pracownika</option>
                <option value="dodaj_oferte">Dodaj nową ofertę</option>
                <option value="usun_oferte">Usuń ofertę</option>
            </select>

            <hr id="hor_line" style="display: none">

            <div id="dodawanie_pracownika" style="display: none;">
                <p>Imię</p>
                <input type="text" name="add_name">

                <p>Nazwisko</p>
                <input type="text" name="add_surname">

                <p>Email</p>
                <input type="text" name="add_email">
                
                <p>Wydział</p>
                <input type="text" name="add_wydzial">                
            </div>

            <div id="dodawanie_oferty" style="display: none">

                <p>Nazwa Oferty</p>
                <input type="text" name="add_oferta_name">

                <p>Kraj</p>
                <input type="text" name="add_oferta_country">

                <p>Miejscowość</p>
                <input type="text" name="add_oferta_city">
                
                <p>Cena</p>
                <input type="text" name="add_oferta_price">  

                <div class="mult_sel" style="display: inline-block">
                    <p>Hotele</p>
                    <select name="add_hotels[]" size="10" multiple>
                        <option value="wybor">Wybierz opcję</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>

                <div class="mult_sel" style="display: inline-block">
                    <p>Wycieczki</p>
                    <select name="add_attractions[]" size="10" multiple>
                        <option value="wybor">Wybierz opcję</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>    

            </div>

            <div id="usuwanie_pracownika" style="display: none;">
                <p>Imię</p>
                <input type="text" name="del_name">

                <p>Nazwisko</p>
                <input type="text" name="del_surname">
                
                <p>Wydział</p>
                <input type="text" name="del_wydzial">  
            </div>

            <div id="usuwanie_oferty" style="display: none;">
                <p>Nazwa Oferty</p>
                <input type="text" name="del_oferta_name">                
            </div>

            <input type="submit" value="Złóż zapytanie"> 
        </form>
        <hr>

        <a href="index.php">Wróć na Główną<a>
    </div>

    <?php     
        if($_POST['add_name'] != "" && $_POST['add_surname'] != "" && $_POST['add_email'] != "" && $_POST['add_wydzial'] != ""){

            $name = $_POST['add_name'];
            $surname = $_POST['add_surname'];
            $email = $_POST['add_email'];
            $wydzial = $_POST['add_wydzial'];

            $tresc = $name . ";" . $surname . ";" . $email . ";" . $wydzial;
            $rodzaj = 1;
            $status = 1;

            unset($name);
            unset($surname);
            unset($email);
            unset($wydzial);

        } elseif($_POST['del_name'] != "" && $_POST['del_surname'] != "" && $_POST['del_wydzial'] != "") {

            $name = $_POST['del_name'];
            $surname = $_POST['del_surname'];
            $wydzial = $_POST['del_wydzial'];

            $tresc = $name . ";" . $surname . ";" . $wydzial;
            $rodzaj = 2;
            $status = 1;

            unset($name);
            unset($surname);
            unset($wydzial);

        } elseif($_POST['add_oferta_name'] != "" && $_POST['add_oferta_country'] != "" && $_POST['add_oferta_city'] != "" && $_POST['add_oferta_price'] != "") {

            $name = $_POST['add_oferta_name'];
            $country = $_POST['add_oferta_country'];
            $city = $_POST['add_oferta_city'];
            $price = $_POST['add_oferta_price'];

            $tresc = $name . ";" . $country . ";" . $city . ";" . $price . ";";

            foreach ($_POST['add_hotels'] as $option_1){
                $tresc = $tresc . $option_1;
            }

            $tresc = $tresc . ";";

            foreach ($_POST['add_attractions'] as $option_2){
                $tresc = $tresc . $option_2;
            }

            $rodzaj = 3;
            $status = 1;

            unset($name);
            unset($country);
            unset($city);
            unset($price);

        } elseif($_POST['del_oferta_name'] != "") {
            $name = $_POST['del_oferta_name'];

            $tresc = $name;
            $rodzaj = 4;
            $status = 1;

            unset($name);

        } else {
            echo "Puste pola, ";
        }

        if(isset($tresc) && isset($rodzaj) && isset($status)){
            if($tresc != "" && $rodzaj != 0 && $status != 0){
                $servername = "sql104.byethost11.com";
                $username = "b11_35479412";
                $password = 'Llellb565634$gh';
                $dbname = 'b11_35479412_eee';
        
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
                $query = "INSERT INTO kolejka_zapytan (Rodzaj, Status, Tresc) 
                VALUES (?, ?, ?)";

                $stmt = $conn->prepare($query);

                $stmt->bind_param("iis", $rodzaj, $status, $tresc);
                $stmt->execute();

                $stmt->close();
                $conn->close();
            
                unset($tresc);
                unset($rodzaj);
                unset($status);

                echo '<script>
                        window.alert("Zapytanie zostało wysłane");
                        window.location.href = "page_create_query.php";
                    </script>';
            } else {
                echo "puste";
            }
        } else {
            echo "nie dodano";
        }
    ?>

    <script src="javascript\check_input.js"></script>
</body>
</html>