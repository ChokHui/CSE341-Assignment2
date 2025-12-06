<?php
include "dbconfig.php";

$id = $_GET["id"];
$sql = "DELETE FROM `admin` WHERE id = $id";
$result = mysqli_query($connect, $sql);

if ($result) {
  header("Location: AdminUser.php?msg=User Deleted");
} else {
  echo "Failed: " . mysqli_error($connect);
}
?>