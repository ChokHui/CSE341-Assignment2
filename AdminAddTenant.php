<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['user'])) {
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
    <link rel="stylesheet" type="text/css" href="./styles/AdminAddTenantComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Add New Tenant</title>
</head>
<body>
    <header>
        <?php
            require_once ('AdminHeader.php');
        ?>
    </header>
    <main>
        <section class="hero container" >
            <h1 class="hero__title" >Add New Tenant</h1>
            <p class="hero__description">Complete the form below to add a new tenant</p>
        </section>
        <section class="hero container">
            <form class="hero__form" action="saveTenantData.php" method="post" id="addTenantForm">
                <?php if (isset($_GET['msg'])) { ?>
					<p class="hero__msg"><?php echo $_GET['msg']; ?></p>
				<?php } ?>
                <p class="hero__subtitle">Trading Name:</p>
                <input class="hero__input" type="text" placeholder="Trading Name" name="tradingName"  id="tradingName" required/>
                <p class="hero__subtitle">Lot No:</p>
                <input class="hero__input" type="text" placeholder="Lot No" name="lotNo" id="lotNo" required/>
                <div class="hero__btn-wrapper">
                    <button class="hero__btn btn" type="submit" name="Submit">Save</button>
                    <button class="hero__btn btn" type="button" onclick="location.href='AdminTenant.php'">Back</button>
                </div>
            </form>
        </section>
    </main>
    <!-- <script src="./src/utils/capitalize.js" ></script> -->
    <!-- <script type="module">
        import mobileNav from './src/utils/mobile-nav.js';
        mobileNav();
    </script> -->
</body>
</html>
<?php
}else {
	header("Location: AdminLogin.php");
	exit();
}
?>