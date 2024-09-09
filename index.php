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
    <table class="table table-striped table-hover">
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
    <h2>Add New Contact</h2>
    <form action="add_contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required pattern="\d+">
        <input type="submit" value="Add">
    </form>
</body>
</html>