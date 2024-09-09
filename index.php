<?php 
    require_once("./functions/db.php");
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include_once("./html/head.php");
    ?>
    <title>Phoney</title>
</head>
<body>
    <h1>Phone me broski</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td>
                <a href="edit_contact.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_contact.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>