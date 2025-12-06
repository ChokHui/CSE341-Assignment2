<?php
include "dbconfig.php";

if (isset($_POST["Update"])) {
    $tenantID = $_POST['tenantID'];
    $tradingName = $_POST['tradingName'];
    $lotNo = $_POST['lotNo'];

    // Create a prepared statement
    $stmt = mysqli_prepare($connect, "UPDATE `tenant` SET `tradingName` = ?, `lotNo` = ? WHERE `tenantID` = ?");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssi", $tradingName, $lotNo, $tenantID);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: AdminEditTenant.php?tenantID=$tenantID&msg=Tenant data updated successfully!");
    } else {
        echo "Failed: " . mysqli_error($connect);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>