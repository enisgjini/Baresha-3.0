<?php

include 'conn-d.php';

if (isset($_GET['id'])) {
    $kid = $_GET['id'];
    $query = $conn->query("SELECT * FROM ngarkimi WHERE klienti='$kid' ORDER BY id DESC");
} else {
    $query = $conn->query("SELECT * FROM ngarkimi ORDER BY id DESC");
}

while ($result = mysqli_fetch_array($query)) {
    $client_id = $result['klienti'];
    $uploader_id = $result['nga'];
    $client_query = $conn->query("SELECT * FROM klientet WHERE id='$client_id'");
    $client = mysqli_fetch_array($client_query);
    $uploader_query = $conn->query("SELECT * FROM users WHERE id='$uploader_id'");
    $uploader = mysqli_fetch_array($uploader_query);
?>
    <tr>
        <td><a href="?del=<?php echo $result['id']; ?>"><i class="ti-trash" onclick="return confirm('Are you sure you want to delete?');" style="color:red; text-decoration: none;"></i></a> &nbsp;<?php echo $result['kengetari']; ?></td>
        <td><?php echo $result['emri']; ?></td>
        <td><?php echo $result['teksti']; ?></td>
        <td><?php echo $result['muzika']; ?></td>
        <td> <?php echo $result['orkestra']; ?></td>
        <td><?php echo $result['co']; ?></td>
        <td><?php echo $result['facebook']; ?></td>
        <td><?php echo $result['instagram']; ?></td>
        <td><?php echo $result['veper']; ?></td>
        <td><?php echo $client['emri']; ?></td>
        <td>
            <?php echo $result['platformat']; ?>
        </td>
        <td><a href="<?php echo $result['linku']; ?>" target="_blank">Open Link</a></td>
        <td><a href="<?php echo $result['linkuplat']; ?>" target="_blank">Open Link</a></td>
        <td><?php echo $result['data']; ?></td>
        <td><?php echo $result['gjuha']; ?></td>
        <td><?php echo $result['infosh']; ?></td>
        <td><?php echo $uploader['name']; ?></td>
    </tr>

<?php } ?>
