<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://api.fontshare.com/v2/css?f[]=general-sans@500,600,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./styles/modern-normalize.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/TenantIndexComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Tenant Home</title>
  </head>
  <body>
    <header>
      <?php
        require_once ('TenantHeader.php');
      ?>
    </header>
    <main>
      <section class="hero container">
        <h1 class="hero__title">Your First Stop Shopping Mall</h1>
        <form action="TenantDisplayReport.php" method="get" class="hero__form">
          <input class="hero__input" type="text" placeholder="&#x270e;   Enter Form Number here!" name="reportNo"/>
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
        <div class="hero__shortcut">
          <div class="hero__sub-shortcut">
            <a class="hero__link" href="TenantFeedbackForm.php">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="hero__icon">

                    <path stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 
                    01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 
                    14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
              <p class="hero__description">Feedback</p>
            </a>
          </div>
        </div>
         <!-- Mobile Shortcut -->
         <div class="mobile-shortcut">
          <div class="mobile-sub-shortcut">
            <a class="mobile-link" href="TenantFeedbackForm.php">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="hero__icon">

                    <path stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 
                    01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 
                    14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
              <p class="hero__description">Feedback</p>
            </a>
          </div>
         </div>
         <!-- End of Mobile Shortcut -->
        <!-- CHOK YING HUI -->
      </section>
    </main>
    <script type="module">
      import mobileNav from './src/utils/mobile-nav.js';
      mobileNav();
    </script>
  </body>
</html>
