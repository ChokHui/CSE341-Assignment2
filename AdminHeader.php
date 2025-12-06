<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
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
    <link rel="stylesheet" type="text/css" href="./styles/AdminHeaderComponents/header.css">
    <link rel="stylesheet" type="text/css" href="./styles/AdminHeaderComponents/mobile-nav.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
  </head>
  <body>
    <header class="header container">
      <img class="header__img" src="./public/logo/logo3.png" alt="Suria Sabah" />
      <nav>
        <ul class="header__menu">
        <?php if($role === 'admin') { ?>
          <li>
            <a class="header__link" href="index.php">Home</a>
          </li>
          <li>
            <a class="header__link" href="AdminFeedback.php">Form</a>
          </li>
          <li>
            <a class="header__link" href="AdminUser.php">User</a>
          </li>
          <li>
            <a class="header__link" href="AdminTenant.php">Tenant</a>
          </li>
          <li class="header__line"></li>
          <li>
            <a class="header__logout btn" href="AdminLogout.php">Log Out</a>
          </li>
        <?php } else { ?>
          <li>
            <a class="header__link" href="index.php">Home</a>
          </li>
          <li>
            <a class="header__link" href="AdminFeedback.php">Form</a>
          </li>
          <li class="header__line"></li>
          <li>
            <a class="header__logout btn" href="AdminLogout.php">Log Out</a>
          </li>
        <?php } ?>
        </ul>
        <button aria-label="mobile nav btn" class="header__bars">
          <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="currentColor">

            <path fill-rule="evenodd" 
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" 
            clip-rule="evenodd" />
          </svg>  
        </button>
      </nav>
    </header>
    <!-- Mobile Navigation -->
    <div class="mobile-nav">
      <nav>
        <ul class="mobile-nav__menu">
          <?php if($role === 'admin') { ?>
            <li>
              <a class="mobile-nav__link" onclick="location.href='index.php';">Home</a>
            </li>
            <li>
              <a class="mobile-nav__link" onclick="location.href='AdminFeedback.php';">Form</a>
            </li>
            <li>
              <a class="mobile-nav__link" onclick="location.href='AdminUser.php';">User</a>
            </li>
            <li>
              <a class="mobile-nav__link" onclick="location.href='AdminTenant.php';">Tenant</a>
            </li>
            <li class="mobile-nav__link-line"></li>
            <li class="mobile-nav__btn btn" onclick="location.href='AdminLogout.php';">Log Out</li>   
          <?php } else { ?>
            <li>
                <a class="mobile-nav__link" onclick="location.href='index.php';">Home</a>
            </li>
            <li>
              <a class="mobile-nav__link" onclick="location.href='AdminFeedback.php';">Form</a>
            </li>
            <li class="mobile-nav__link-line"></li>
            <li class="mobile-nav__btn btn" onclick="location.href='AdminLogout.php';">Log Out</li> 
          <?php } ?>
        </ul>
      </nav>
    </div>
    <!-- End of Mobile Navigation -->
    <script type="module">
      import mobileNav from './src/utils/mobile-nav.js';
      mobileNav();
    </script>
  </body>
</html>
<?php
?>