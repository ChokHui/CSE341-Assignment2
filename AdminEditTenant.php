<?php
session_start();
include "dbconfig.php";

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['user']) || isset($_SESSION['tenantID'])) {
    $tenantID = $_GET['tenantID'];

    // Query to retrieve data
    $sql = "SELECT * FROM tenant WHERE tenantID = '$tenantID'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://api.fontshare.com/v2/css?f[]=general-sans@500,600,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/AdminEditTenantComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Update Tenant Info</title>
</head>
<body>
    <header>
        <?php
            require_once ('AdminHeader.php');
        ?>
    </header>
    <main>
        <section class="hero container" >
            <h1 class="hero__title" >Update Tenant Info</h1>
            <p class="hero__description">Complete the form below to update tenant info</p>
        </section>
        <section class="hero container">
            <form class="hero__form" action="editTenantData.php" method="post" id="editTenantForm">
                <?php if (isset($_GET['msg'])) { ?>
                    <p class="hero__msg"><?php echo $_GET['msg']; ?></p>
                <?php } ?>
                <input class="hero__input" type="hidden" value="<?php echo $row['tenantID']; ?>" name="tenantID"  id="tenantID"/>
                <p class="hero__subtitle">Shop Name:</p>
                <input class="hero__input text-light" type="text" value="<?php echo $row['tradingName']; ?>" name="tradingName"  id="tradingName"/>
                <p class="hero__subtitle">Lot No:</p>
                <input class="hero__input text-light" type="text" value="<?php echo $row['lotNo']; ?>" name="lotNo" id="lotNo"/>
                <div class="hero__btn-wrapper">
                    <button class="hero__btn btn" type="submit" name="Update">Update</button>
                    <button class="hero__btn btn" type="button" onclick="location.href='AdminTenant.php';">Back</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
<?php
}else {
	header("Location: AdminLogin.php");
	exit();
}
?>