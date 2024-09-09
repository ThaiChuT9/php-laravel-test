<?php
    require_once("./functions/db.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $stmt = $conn->prepare("INSERT INTO contacts (name, phone_number) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone_number);

    if ($stmt->execute()) {
        echo "New contact added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}