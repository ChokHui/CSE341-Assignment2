<?php
include "dbconfig.php";

if (isset($_POST["Submit"])) {
   $tradingName = $_POST['tradingName'];
   $lotNo = $_POST['lotNo'];

   // Create a prepared statement
   $stmt = mysqli_prepare($connect, "INSERT INTO `tenant` (`tenantID`, `tradingName`, `lotNo`) VALUES (NULL, ?, ?)");

   // Bind parameters to the prepared statement
   mysqli_stmt_bind_param($stmt, "ss", $tradingName, $lotNo);

   // Execute the prepared statement
   if (mysqli_stmt_execute($stmt)) {
      header("Location: AdminAddTenant.php?msg=New tenant created successfully!");
   } else {
      echo "Failed: " . mysqli_error($connect);
   }

   // Close the prepared statement
   mysqli_stmt_close($stmt);
}
?>