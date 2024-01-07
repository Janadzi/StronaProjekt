<?php
    // Plik dla skryptów jednorazowych
    /*
    $servername = "sql104.byethost11.com";
    $username = "b11_35479412";
    $password = 'Llellb565634$gh';
    $dbname = 'b11_35479412_eee';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);


    $query = "SELECT id, Haslo FROM Konta";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $hashedPassword = password_hash($row['Haslo'], PASSWORD_DEFAULT);
    
        // Update the database with the hashed password
        $updateQuery = "UPDATE Konta SET Haslo = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("si", $hashedPassword, $row['id']);
        $updateStmt->execute();
    }

    $conn->close();
    */
?>