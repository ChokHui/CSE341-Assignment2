<?php
// Establish database connection
$connect = mysqli_connect("localhost", "root", "", "report_db");

if (isset($_POST['tenantID'])) {
    $tenant_ID = $_POST['tenantID'];

    // Retrieve lot no data from the database based on the selected trading
    $lot = mysqli_query($connect, "SELECT * FROM tenant WHERE tenantID = $tenant_ID");

    // Generate HTML options for the lot no/unit dropdown
    if (mysqli_num_rows($lot) > 0) {
        echo '<option value="">Select lot no/unit</option>';
        while ($row = mysqli_fetch_assoc($lot)) {
            $selected = ($row['lotNo'] == $tenant_ID) ? 'selected' : '';
            echo '<option value="'.$row['lotNo'].'" '.$selected.'>'.$row['lotNo'].'</option>';
        }
    } else {
        echo '<option value="">No lot number/unit available</option>';
    }
}
?>