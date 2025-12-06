<?php
include "dbconfig.php";

if (isset($_POST["Submit"])) {
   $user = $_POST['user'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $role = $_POST['role'];

   // Create a prepared statement
   $stmt = mysqli_prepare($connect, "INSERT INTO `admin` (`id`, `user`, `username`, `password`, `role`) VALUES (NULL, ?, ?, ?, ?)");

   // Bind parameters to the prepared statement
   mysqli_stmt_bind_param($stmt, "ssss", $user, $username, $password, $role);

   // Execute the prepared statement
   if (mysqli_stmt_execute($stmt)) {
      header("Location: AdminAddUser.php?msg=New user created successfully!");
   } else {
      echo "Failed: " . mysqli_error($connect);
   }

   // Close the prepared statement
   mysqli_stmt_close($stmt);
}
?>