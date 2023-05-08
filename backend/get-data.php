<?php
include("connection.php");

$rows = mysqli_query($conn, "SELECT * FROM user");

$i = 1;
foreach($rows as $row) {
?>
<tr>
    <td><?= $i++ ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><img src="upload/m0v3ugdI5u.jpg" alt="photo" height="200px"></td>
</tr>
<?php
}
?>