<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['user']) && isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
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
    <link rel="stylesheet" type="text/css" href="./styles/indexComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Admin Home</title>
  </head>
  <body>
    <header>
      <?php
        require_once ('AdminHeader.php');
      ?>
    </header>
    <main>
      <section class="hero container">
        <h1 class="hero__title">WELCOME, <?php echo $_SESSION['username']; ?>!</h1>
        <form action="AdminDisplayReport.php" method="get" class="hero__form">
          <input class="hero__input" type="text" placeholder="&#x270e;   Enter form number here!"  name="reportNo"/>
          <button class="hero__btn" type="submit">Search</button>
          <!-- Mobile Search Bar -->
          <button aria-label="mobile search btn" class="hero__search" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" 
              fill="none" 
              viewBox="0 0 24 24" 
              stroke-width="2.5" 
              stroke="white" 
              class="w-6 h-6">

              <path  
                stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
          </button>
          <!-- End of Mobile Search Bar -->
        </form>
        <?php if($role === 'admin') { ?>
        <div class="hero__shortcut">
          <div class="hero__sub-shortcut">
            <a class="hero__link" href="AdminFeedback.php">
              <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">
    
                <path stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>
              <p class="hero__description">Check Form</p>
            </a>
          </div>
          <div class="hero__sub-shortcut">
            <a class="hero__link" href="AdminUser.php">
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">

                <path 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
              <p class="hero__description">User</p>
            </a>
          </div>
          <!-- CHOK YING HUI -->
          <div class="hero__sub-shortcut">
            <a class="hero__link" href="AdminTenant.php">
              <svg xmlns="http://www.w3.org/2000/svg" 
              fill="none" 
              viewBox="0 0 24 24" 
              stroke-width="1.5" 
              stroke="currentColor" 
              class="hero__icon">
    
                <path stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 
                0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 
                0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 
                2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 
                0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 
                0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
              </svg>
              <p class="hero__description">Tenant</p>
            </a>
          </div>
        </div>
        <?php } else { ?>
          <div class="hero__sub-shortcut">
            <a class="hero__link" href="AdminFeedback.php">
              <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">
    
                <path stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>
              <p class="hero__description">Check Form</p>
            </a>
          </div>
        </div>
        <?php } ?>
         <!-- Mobile Shortcut -->
         <?php if($role === 'admin') { ?>
         <div class="mobile-shortcut">
          <div class="mobile-sub-shortcut">
            <a class="mobile-link" href="AdminFeedback.php">
              <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">
    
                <path stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>
              <p class="hero__description">Check Form</p>
            </a>
          </div>
          <div class="mobile-sub-shortcut">
            <a class="mobile-link" href="AdminUser.php">
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">

                <path 
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
              <p class="hero__description">User</p>
            </a>
          </div>
          <div class="mobile-sub-shortcut">
            <a class="mobile-link" href="AdminTenant.php">
              <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">
                <path stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 
                0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 
                9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 
                3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 
                3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 
                00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
              </svg>
              <p class="hero__description">Tenant</p>
            </a>
          </div>
         </div>
         <?php } else { ?>
          <div class="mobile-sub-shortcut">
            <a class="mobile-link" href="AdminFeedback.php">
              <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="hero__icon">
    
                <path stroke-linecap="round" 
                stroke-linejoin="round" 
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
              </svg>
              <p class="hero__description">Check Form</p>
            </a>
          </div>
         <?php } ?>
         <!-- End of Mobile Shortcut -->
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