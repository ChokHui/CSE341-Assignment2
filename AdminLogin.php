<?php
  include ('dbconfig.php');
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
    <link rel="stylesheet" type="text/css" href="./styles/AdminLoginComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Admin Login</title>
  </head>
  <body>
    <main>
      <section class="hero container">
        <img class="hero__img" src="./public/logo/logo3.png" alt="Suria Sabah" />
      </section>
      <section class="hero container">
        <form class="hero__form" method="post" action="AdminLogin2.php">
          <h1 class="hero__title">ADMIN LOGIN</h1>
          <?php if (isset($_GET['error'])) { ?>
						<p class="hero__error"><?php echo $_GET['error']; ?></p>
					<?php } ?>
          <input class="hero__input" type="text" name="uname" placeholder="Username" /><br>
          <input class="hero__input" type="password" name="password" placeholder="Password" /><br>
          <button class="btn2 hero__login" type="submit">LOGIN</button>
        </form>
      </section>
    </main>
  </body>
</html>
