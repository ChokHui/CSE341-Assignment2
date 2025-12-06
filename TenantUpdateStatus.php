<?php
session_start();
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
  <link rel="stylesheet" type="text/css" href="./styles/TenantUpdateStatusComponents/hero.css">
  <link rel="stylesheet" type="text/css" href="./styles/utils.css">
  <title>Tenant Feedback Form - Tenant Update Status</title>
</head>
<body>
  <header>
    <?php
      require_once ('TenantHeader.php');
    ?>
  </header>
  <main>
    <section class="hero container" >
      <h1 class="hero__title" >Update Status</h1>
      <p class="hero__description">Complete the form below to update the progress</p>
    </section>
    <section class="hero container">
      <form class="hero__form" method="post" action="TenantUpdatedStatus.php?reportNo=<?php echo $_GET['reportNo'];?>">
        <div class="hero__half">
          <p class="hero__subtitle">Status:</p>
          <input class="hero__input hidden-input" type="text" id="status" name="status" value="---" readonly>
        </div>
        <div class="hero__half">
          <p class="hero__subtitle">Comment By:</p>
          <input class="hero__input hidden-input" type="text" id="commentBy" name="commentBy" value="Tenant" readonly>
        </div>
        <div class="hero__full">
          <p class="hero__subtitle" >Remark:</p>
          <input class="hero__input hero__feedback" id="details" name="details" placeholder="Leave your message here..." autocomplete="off" required></input>
        </div>
        <div class="hero__full hero__btn-wrapper">
          <button class="hero__btn btn" type="submit" name="Submit">Submit</button>
          <button class="hero__btn btn" type="button" onclick="location.href='TenantDisplayReport.php?reportNo=<?php echo $_GET['reportNo']; ?>'">Back</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>
<?php
  include ('TenantTimeline.php');
?>
