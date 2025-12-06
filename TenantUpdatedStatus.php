<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5;url=TenantTimeline.php?reportNo=<?php echo $_GET['reportNo'];?>">
    <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/TenantUpdatedStatusComponents/message.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Tenant Updated Status</title>
</head>
<body>
    <section class="message container">
        <?php
        // session_start();
        include('dbconfig.php');
        
        // If upload button is clicked ...
        if (isset($_POST['Submit'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {              
                // Generate the current date
                date_default_timezone_set('Asia/Kuala_Lumpur');
                $date = date('Y-m-d H:i:s');
                
                if (isset($_GET['reportNo'])) {
                    // Retrieve the reportNo from the URL parameter
                    $reportNo = $_GET['reportNo'];
                    
                    // Retrieve the resolvedBy value from the session
                    $status = $_POST['status'];
                    $commentBy = $_POST['commentBy'];
                    
                    // Retrieve the details value from the POST data
                    $details = mysqli_real_escape_string($connect, $_POST['details']);
                    
                    // Prepare the INSERT statement
                    $sql = "INSERT INTO updated (reportNo, status, commentBy, details, date) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($connect, $sql);
                    mysqli_stmt_bind_param($stmt, "sssss", $reportNo, $status, $commentBy, $details, $date);
                    
                    // Execute the prepared statement
                    if (!empty($details) && mysqli_stmt_execute($stmt)) {
                        // Insertion successful
                        echo '<p class="message__success">Status updated successfully.</p>';
                        echo '<p class="message__countdown">Redirecting to Timeline page in <span id="countdown">5</span> seconds...</p>';
                    } else {
                        echo '<p class="message__error">Failed: ' . mysqli_error($connect) . '</p>';
                    }
                    
                    // Close the prepared statement
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Missing reportNo parameter in URL.";
                }
            } else {
                echo '<p class="message__error">Failed: ' . mysqli_error($connect) . '</p>';
            }
        }
        ?>
    </section>
    <script>
        // Countdown function
        function countdown() {
            var count = 4; // Set the countdown time in seconds
            var countdownElement = document.getElementById("countdown");

            var countdownInterval = setInterval(function () {
                countdownElement.innerHTML = count;
                count--;
    
                if (count < 0) {
                    clearInterval(countdownInterval);
                    window.location.href = "TenantTimeline.php?reportNo=<?php echo $reportNo; ?>";
                }
            }, 1000);
        }
    
        // Call the countdown function when the page loads
        window.onload = countdown;
    </script>
</body>
</html>