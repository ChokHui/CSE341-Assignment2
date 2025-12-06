<?php 
session_start(); 
include ('dbconfig.php'); 

// Check connection 
if ($connect->connect_error) { 
    die("Connection failed: " . $connect->connect_error); 
} 

// Get user input 
$reportNo = $_GET["reportNo"]; 

// Remove any non-numeric characters from the report number 
$reportNo = preg_replace('/[^0-9]/', '', $reportNo); 

// Check if reportNo is empty and redirect if it is 
if (empty($reportNo)) { 
    header("Location: AdminIndex.php?error=Form Number is required"); 
    exit(); 
} else { 
    // Prepare statement with parameterized query 
    $stmt = $connect->prepare("SELECT * FROM feedback WHERE reportNo = ?"); 
    $stmt->bind_param("i", $reportNo); 
    
    // Execute statement 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
    
    // Check if any rows were returned 
    if ($result->num_rows > 0) { 
        // Output data of the first row 
        $row = $result->fetch_assoc(); 
?> 

<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8" /> 
        <link rel="icon" type="image/svg+xml" href="/vite.svg" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
        <link href="https://api.fontshare.com/v2/css?f[]=general-sans@500,600,400,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css"> 
        <link rel="stylesheet" type="text/css" href="./styles/style.css"> 
        <link rel="stylesheet" type="text/css" href="./styles/AdminDisplayReportComponents/hero.css"> 
        <link rel="stylesheet" type="text/css" href="./styles/utils.css"> 
        <title>Tenant Feedback Form</title> 
    </head> 
    <body> 
        <header> 
            <?php include_once ('AdminHeader.php'); ?> 
        </header> <section class="hero container"> 
            <h1 class="hero__title">Tenant Feedback Form</h1> 
             <p> (Form Number: <?php echo $row["reportNo"] . ")"; ?> </p> 
            </section> <main> <section class="hero container"> 
                <form class="hero__form" method="post"> 
                    <div class="hero__half"> 
                        <p class="hero__subtitle" >Shop Name:</p> 
                        <p class="hero__input"><?php echo $row["tradingName"]; ?></p> 
                    </div> 
                    <div class="hero__half"> 
                        <p class="hero__subtitle" >Lot No/Unit:</p> 
                        <p class="hero__input"><?php echo $row["lotNo"]; ?></p> 
                    </div> 
                    <div class="hero__half"> 
                        <p class="hero__subtitle" >Email:</p> 
                        <p class="hero__input"><?php echo $row["email"]; ?></p> 
                    </div> 
                    <div class="hero__half"> 
                        <p class="hero__subtitle" >Contact No:</p> 
                        <p class="hero__input"><?php echo $row["contactNo"]; ?></p> 
                    </div> 
                    <div class="hero__full"> 
                        <p class="hero__subtitle" >Category:</p> 
                        <p class="hero__input"><?php echo $row["complaintCat"]; ?></p> 
                    </div> 
                    <div class="hero__full"> 
                        <p class="hero__subtitle" >Details of Feedback:</p> 
                        <p class="hero__input hero__details"><?php echo nl2br($row["details"]); ?></p> 
                    </div> 
                    <div class="hero__attachments"> 
                        <div class="hero__three"> 
                            <p class="hero__subtitle" >Attachment 1:</p> 
                            <img src="./images/<?php echo $row['attach1']; ?>" alt="Attachment 1" class="hero__img" onclick="change(this)"> 
                        </div> 
                        <div class="hero__three"> 
                            <p class="hero__subtitle" >Attachment 2:</p> 
                            <img src="./images/<?php echo $row['attach2']; ?>" alt="Attachment 2" class="hero__img" onclick="change(this)"> 
                        </div> 
                        <div class="hero__three"> 
                            <p class="hero__subtitle" >Attachment 3:</p> 
                            <img src="./images/<?php echo $row['attach3']; ?>" alt="Attachment 3" class="hero__img" onclick="change(this)"> 
                        </div> 
                    </div> 
                    <div class="hero__full hero__btn-wrapper"> 
                        <button class="hero__btn btn" type="button" onclick="location.href='AdminUpdateStatus.php?reportNo=<?php echo $row['reportNo']; ?>'">Update Status</button> 
                        <button class="hero__btn btn" type="button" onclick="location.href='AdminFeedback.php';">Back</button> 
                    </div> 
                </form> 
                <script> 
                    function change(element) { element.classList.toggle ("hero__img-fullsize"); } 
                </script> 
                </section> 
            </main> 
        </body> 
        </html> 
        
        <?php 
    } else { 
        echo "Sorry, wrong form number."; 
        } 
    } 
    
    // Close statement and database connection 
    $stmt->close(); 
    $connect->close(); 
?>