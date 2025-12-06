<?php 
include('dbconfig.php'); 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php'; 
require 'phpmailer/src/SMTP.php'; 

// if(isset($_POST["send"])){ 
$mail = new PHPMailer(true); 

// If upload button is clicked ... 
if (isset($_POST['Submit'])) { 
    
    // Generate reportNo 
    // Set the new timezone 
    date_default_timezone_set('Asia/Kuala_Lumpur'); 
    $reportNo = date('ymdHis'); // capital H represents 24-hour format 
    
    $filename = $_FILES["attach1"]["name"]; 
    $tempname = $_FILES["attach1"]["tmp_name"]; 
    $folder = "./images/" . $filename; 
    
    $filename2 = $_FILES["attach2"]["name"]; 
    $tempname2 = $_FILES["attach2"]["tmp_name"]; 
    $folder2 = "./images/" . $filename2; 
    
    $filename3 = $_FILES["attach3"]["name"]; 
    $tempname3 = $_FILES["attach3"]["tmp_name"]; 
    $folder3 = "./images/" . $filename3; 
    
    // Set the character set for the connection 
    mysqli_set_charset($connect, "utf8mb4"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $tradingID = mysqli_real_escape_string($connect, $_POST["trading"]); 
        $lotNo = mysqli_real_escape_string($connect, $_POST["lot"]); 
        $email = mysqli_real_escape_string($connect, $_POST["email"]); 
        $contactNo = mysqli_real_escape_string($connect, $_POST["contact"]); 
        $complaintCat = mysqli_real_escape_string($connect, $_POST["complaintCat"]); 
        
        // Retrieve the trading name based on the selected trading ID 
        $query = "SELECT tradingName FROM tenant WHERE tenantID = $tradingID"; 
        $result = mysqli_query($connect, $query); 
        
        if ($result && mysqli_num_rows($result) > 0) { 
            $row = mysqli_fetch_assoc($result); 
            $tradingName = $row['tradingName']; 
            
            // $reportNo = $row['reportNo']; 
            
            // Prepare the INSERT statement 
            $sql = "INSERT INTO feedback (reportNo, tradingName, lotNo, email, contactNo, complaintCat, details, attach1, attach2, attach3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
            $stmt = mysqli_prepare($connect, $sql); 
            
            // Convert line breaks to Unix format (\n) before storing in the database 
            $details = str_replace("\r\n", "\n", $_POST["details"]); 
            
            // Bind the parameters and execute the prepared statement 
            mysqli_stmt_bind_param($stmt, "ssssssssss", $reportNo, $tradingName, $lotNo, $email, $contactNo, $complaintCat, $details, $filename, $filename2, $filename3); 
            
            if (mysqli_stmt_execute($stmt)) { 
                // Move uploaded files to the designated folder 
                if (move_uploaded_file($tempname, $folder) && move_uploaded_file($tempname2, $folder2) && move_uploaded_file($tempname3, $folder3)) { 
                    $query = "SELECT reportNo FROM feedback WHERE reportNo = ?"; 
                    $stmt2 = mysqli_prepare($connect, $query); // Use a different statement variable 
                    
                    // Bind a parameter for the reportNo in the SELECT statement 
                    mysqli_stmt_bind_param($stmt2, "s", $reportNo); // Use $reportNo from the outer scope 
                    
                    mysqli_stmt_execute($stmt2); 
                    $result = mysqli_stmt_get_result($stmt2); 
                    $row = mysqli_fetch_assoc($result); 
                    $reportNoFromDB = $row['reportNo']; 
                    
                    // Check if the reportNo was retrieved successfully 
                    if ($reportNoFromDB) { 
                        // Use the retrieved reportNo in the email subject 
                        $mail->Subject = "Your feedback has been successfully submitted. Here is your Form No: " . $reportNoFromDB; 
                        // $mail->Subject = "This is a testing email" . $reportNoFromDB; 
                    } else { 
                        echo "Failed to retrieve reportNo from the database."; 
                    } 

                    mysqli_stmt_close($stmt2); 
                    header("Location: TenantFeedbackForm.php?msg=Form submitted successfully!"); 
                } else { 
                    echo "<h3>Failed to upload image!</h3>"; 
                } 
            } else { 
                echo "Failed: " . mysqli_error($connect); 
            } 
            
            // Close the prepared statement 
            mysqli_stmt_close($stmt); 
        } else { 
            // echo "Invalid trading selected."; 
            echo "Failed: " . mysqli_error($connect); 
        } 
    } 
    
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'amberchok73@gmail.com'; 
    $mail->Password = 'honi ianp bars bxne'; 
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port = 465; 

    $mail->setFrom('amberchok73@gmail.com');

    $mail->addAddress($_POST["email"]); 
    
    // Add CC recipients 
    // $mail->addCC('amber_chok@suriasabah.com.my'); 

    $mail->isHTML(true); 
    $mail->Body = "This is an automatically generated email – please do not reply to it.". "<br><br>" .$_POST["details"]; 
    
    $mail->send(); 
    
    echo 
    " 
    <script> 
    // alert('Sent Successfully'); 
    document.location.href = 'mailTemplate.php'; 
    </script> 
    ";
}
?>