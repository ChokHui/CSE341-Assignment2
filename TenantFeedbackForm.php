<?php
    include ('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://api.fontshare.com/v2/css?f[]=general-sans@500,600,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/TenantFeedbackFormComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#trading').change(function() {
                var tenant_ID = $(this).val();
                if (tenant_ID) {
                    $.ajax({
                        url: 'getLotNo.php',
                        type: 'POST',
                        data: { tenantID: tenant_ID },
                        success: function(response) {
                            $('#lot').html(response);
                            $('#lot').prop('disabled', false);
                        }
                    });
                } else {
                    $('#lot').html('<option value="">Select trading name first</option>');
                    $('#lot').prop('disabled', true);
                }
            });
        });
    </script>
    <title>Tenant Feedback Form - Tenant Feedback Form</title>
</head>
<body>
    <header>
      <?php
        require_once ('TenantHeader.php');
      ?>
    </header>
    <main>
        <section class="hero container">
            <h1 class="hero__title">Tenant Feedback Form</h1>
        </section>
        <section class="hero container">
            <form class="hero__form" method="post" action="TenantSubmitFeedback.php" enctype="multipart/form-data">
                <?php if (isset($_GET['msg'])) { ?>
					<p class="hero__msg"><?php echo $_GET['msg']; ?></p>
				<?php } ?>
                <div class="hero__half">
                    <p class="hero__subtitle" >Shop Name:</p>
                    <!-- <input class="hero__input" type="text" placeholder="Trading Name" name="user"  id="user" required/> -->
                    <select class="hero__input hero__cursor" id="trading" name="trading">
                        <option value="">Select Shop Name</option>
                        <?php
                        // Establish database connection
                        $connect = mysqli_connect("localhost", "root", "", "report_db");

                        // Retrieve top-level tradings from the database
                        $tradings = mysqli_query($connect, "SELECT * FROM tenant ORDER BY tradingName");
                        while ($row = mysqli_fetch_assoc($tradings)) {
                            echo '<option value="'.$row['tenantID'].'">'.$row['tradingName'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="hero__half">
                    <p class="hero__subtitle" >Lot No/Unit:</p>
                    <!-- <input class="hero__input" type="text" placeholder="Lot No/Unit" name="user"  id="user" required/> -->
                    <select class="hero__input hero__cursor" id="lot" name="lot" disabled>
                        <option value="">Select trading name first</option>
                    </select>
                </div>
                <div class="hero__half">
                    <p class="hero__subtitle" >Email:</p>
                    <input class="hero__input" type="email" placeholder="Email" name="email" required/>
                </div>
                <div class="hero__half">
                    <p class="hero__subtitle" >Contact No:</p>
                    <input class="hero__input" type="text" placeholder="Contact Number" name="contact" required/>
                </div>
                <div class="hero__full">
                    <p class="hero__subtitle" >Category of Feedback:</p>
                    <select class="hero__input hero__cursor" name="complaintCat" required>
						<option value="AC">Air Conditioner</option>
						<option value="Power">Power</option>
						<option value="GAS">GAS</option>
						<option value="Toilet">Toilet</option>
						<option value="Elevator">Elevator</option>
						<option value="Maintenance">Maintenance</option>
						<option value="Security">Security</option>
						<option value="Other">Other</option>
					</select>
                </div>
                <div class="hero__full">
                    <p class="hero__subtitle" >Details of Feedback:</p>
                    <!-- <textarea id="details" name="details" rows="7" placeholder="Leave your message here..." maxlength="5000" style="width: 100%; height: auto; overflow: scroll" required></textarea> -->
                    <textarea class="hero__input hero__feedback" id="details" name="details" placeholder="Leave your message here..."required></textarea>
                </div>
                <div class="hero__attachments">
                    <div class="hero__three">
                        <p class="hero__subtitle" >Attachment 1:</p>
                        <input class="hero__input hero__cursor" type="file" name="attach1" value="" required/>
                    </div>
                    <div class="hero__three">
                        <p class="hero__subtitle" >Attachment 2:</p>
                        <input class="hero__input hero__cursor" type="file" name="attach2" value="" required/>
                    </div>
                    <div class="hero__three">
                        <p class="hero__subtitle" >Attachment 3:</p>
                        <input class="hero__input hero__cursor" type="file" name="attach3" value="" required/>
                    </div>
                </div>
                <div class="hero__btn-wrapper">
                    <button class="hero__btn btn" type="submit" name="Submit">Submit</button>
                    <button class="hero__btn btn" type="button" onclick="location.href='TenantIndex.php';">Cancel</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>