<?php
include_once "Database/connection.php";
$database = new Database();
$connection = $database->connect();
$name = $_POST['name'];
$entry = $_POST['entry'];
if (isset($_POST['name']) && ($_POST['entry'])){
    $database->query($connection,sprintf("INSERT INTO entries (name, entry, entry_time) VALUES('$name','$entry',now())"));
}

$reply = $database->query($connection, sprintf("SELECT * FROM entries"));

while ($data = $reply->fetch_assoc()) {
    ?>
    <li><b><?php echo $data['name']; ?><b> - <?php echo $data['entry'] ?> - <?php echo $database->dateFormat($data['entry_time']); ?></li>
<?php }
echo '</table>';
$database->close($connection);
?>