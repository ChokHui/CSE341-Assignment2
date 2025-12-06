<?php
include "dbconfig.php";

$tenantID = $_GET["id"];
$sql = "DELETE FROM `tenant` WHERE tenantID = $tenantID";
$result = mysqli_query($connect, $sql);

if ($result) {
  header("Location: AdminTenant.php?msg=Tenant Deleted");
} else {
  echo "Failed: " . mysqli_error($connect);
}
?>