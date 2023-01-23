<?php include 'conn-d.php'; ?>
<?php

$merri = $conn->query("SELECT * FROM logs ORDER BY id DESC");
while ($k = mysqli_fetch_array($merri)) {
?>
    <tr>
        <td><?php echo $k['stafi']; ?></td>
        <td>
            <?php echo $k['ndryshimi']; ?>
        </td>
        <td><?php echo $k['koha']; ?></td>
    </tr>
<?php } ?>