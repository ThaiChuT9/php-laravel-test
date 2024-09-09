<?php
require_once("./functions/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE contacts SET name = ?, phone_number = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $phone_number, $id);

    if ($stmt->execute()) {
        echo "Contact updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contacts WHERE id = $id";
    $result = $conn->query($sql);
    $contact = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include_once("./html/head.php") ?>
    <title>Edit Contact</title>
</head>
<body class="container">
    <h1>Edit Contact</h1>
    <form action="edit_contact.php" method="post">
        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $contact['name']; ?>" required>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php echo $contact['phone_number']; ?>" required pattern="\d+">
        <input type="submit" value="Save">
    </form>
</body>
</html>
