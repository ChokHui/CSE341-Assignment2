<?php
require ('dbconfig.php');

// Get user input
// $reportNo = $_GET["reportNo"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://api.fontshare.com/v2/css?f[]=general-sans@500,600,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <img src="./public/logo/logo3.png" alt="Suria Sabah">
</head>
<body>
    <h1>Appreciating Your Valuable Feedback - Thank You!</h1>
    <h2>From: Suria Sabah Management Team</h2>
    <p>Thank you for sending us your feedback! Your input is incredibly important to us and helps us improve our mall better.</p><br>
    <p>Here is your form number: </p>
    <!-- <p><?php echo $reportNo ?></p><br> -->
    <p>You may check the progression at this link: <a href="TenantIndex.php">Tenant Feedback Form - Home</a></p>
    <p>Yours sincerely, <br>Suria Sabah Shopping Mall</p>
    <form class="" action="mailScript.php" method="post">
        Email <input type="email" name="email" value=""><br>
        Subject <input type="text" name="subject" value=""><br>
        Message <input type="text" name="message" value=""><br>
        <button type="submit" name="send">Send</button>
    </form>
</body>
</html>