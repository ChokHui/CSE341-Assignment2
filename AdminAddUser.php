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
    <link rel="stylesheet" type="text/css" href="./styles/AdminAddUserComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Add New User</title>
</head>
<body>
    <header>
        <?php
            require_once ('AdminHeader.php');
        ?>
    </header>
    <main>
        <section class="hero container" >
            <h1 class="hero__title" >Add New User</h1>
            <p class="hero__description">Complete the form below to add a new user</p>
        </section>
        <section class="hero container">
            <form class="hero__form" action="saveAdminData.php" method="post" id="addUserForm">
                <?php if (isset($_GET['msg'])) { ?>
					<p class="hero__msg"><?php echo $_GET['msg']; ?></p>
				<?php } ?>
                <p class="hero__subtitle" >Name:</p>
                <input class="hero__input capitalize" type="text" placeholder="Name" name="user"  id="user" required/>
                <p class="hero__subtitle" >Username:</p>
                <input class="hero__input" type="text" placeholder="Username" name="username" id="username" required/>
                <p class="hero__subtitle" >Password:</p>
                <input class="hero__input" type="password" placeholder="Password" name="password" id="password" required/>
                <div class="hero__radioBtn">
                    <p class="hero__subtitle" >Role:</p>
                    <input type="radio" name="role" value="admin" required >
                    <label class="hero__radioBtn-opt" for="admin">Admin</label>
                    <input type="radio" name="role" value="user" >
                    <label class="hero__radioBtn-opt" for="admin">User</label>
                </div>
                <div class="hero__btn-wrapper">
                    <button class="hero__btn btn" type="submit" name="Submit">Save</button>
                    <button class="hero__btn btn" onclick="location.href='AdminUser.php'">Back</button>
                </div>
            </form>
        </section>
    </main>
    <script type="module">
        import mobileNav from './src/utils/mobile-nav.js';
        mobileNav();
    </script>
</body>
</html>
<?php
}else {
	header("Location: AdminLogin.php");
	exit();
}
?>