<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="css\login_register_page.css">
</head>

<form name="register" id="reg" method="post">
        <p>Stare Hasło: </p>
        <input type="text" name="old_password" id="old_pass">
        <p>Nowe Hasło:</p>
        <input type="password" name="password" id="pass">
        <p>Powtórz Hasło:</p>
        <input type="password" name="password_repeat" id="repeat"> <br>
            
        <p id="wrong" style="display: none">Hasła muszą być takie same</p>
        <p id="login_used" style="display: none">Wpisany login jest już w użyciu</p>

        <input type="submit" value="Zmień Hasło">
</form>