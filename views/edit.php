<?php
include "conf.php";

$id = "";
$name = "";
$email = "";
$phone = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location: ../index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from members where id=$id";

    $conn = mysqli_connect(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header("location: ../index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "update members set name='$name', email='$email', phone='$phone' where id='$id'";

    $conn = mysqli_connect(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>

