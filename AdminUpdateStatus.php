<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['user'])) {
  include('dbconfig.php');
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
  <link rel="stylesheet" type="text/css" href="./styles/AdminUpdateStatusComponents/hero.css">
  <link rel="stylesheet" type="text/css" href="./styles/utils.css">
  <title>Tenant Feedback Form - Admin Update Status</title>
</head>
<body>
  <header>
    <?php
      require_once ('AdminHeader.php');
    ?>
  </header>
  <main>
    <section class="hero container" >
      <h1 class="hero__title" >Update Status</h1>
      <p class="hero__description">Complete the form below to update the progress</p>
    </section>
    <section class="hero container">
      <form class="hero__form" method="post" action="AdminUpdatedStatus.php?reportNo=<?php echo $_GET['reportNo'];?>">
        <div class="hero__half">
          <p class="hero__subtitle" >Status:</p>
          <select class="hero__input hero__cursor" id="status" name="status" required>
						<option value="Pending">Pending</option>
						<option value="In Progress">In Progress</option>
						<option value="Completed">Completed</option>
					</select>
        </div>
        <div class="hero__half">
          <p class="hero__subtitle">Verified By:</p>
          <?php
          // Retrieve the username from the session or wherever it's stored
          $user = $_SESSION['user'];
          ?>
          <input class="hero__input hidden-input" type="text" id="commentBy" name="commentBy" value="<?php echo $_SESSION['user']; ?>" readonly>
        </div>
        <div class="hero__full">
          <p class="hero__subtitle" >Remark:</p>
          <input class="hero__input hero__feedback" id="details" name="details" placeholder="Leave your message here..." autocomplete="off" required></input>
        </div>
        <div class="hero__full hero__btn-wrapper">
          <button class="hero__btn btn" type="submit" name="Submit">Submit</button>
          <button class="hero__btn btn" onclick="history.back()">Back</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>
<?php
  include ('AdminTimeline.php');
}else {
	header("Location: AdminLogin.php");
	exit();
}
?>