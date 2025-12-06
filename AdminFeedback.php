<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['user'])) {
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
    <link rel="stylesheet" type="text/css" href="./styles/AdminFeedbackComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/AdminFeedbackComponents/table.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Feedback List</title>
</head>
<body>
    <header>
      <?php
        require_once ('AdminHeader.php');
      ?>
    </header>
    <main>
        <section class="hero container">
            <h1 class="hero__title" >Feedback List</h1>
        </section>
        <section class="table container">
            <div class="table__dltMsg">
                <?php if (isset($_GET['msg'])) { ?>
                    <p class="table__msg"><?php echo $_GET['msg']; ?></p>
                <?php } ?>
            </div>
            <table class="table-auto" id="userTable">
            <thead class="table__head">
                <tr>
                <th>ID</th>
                <th>Form No</th>
                <th>Shop Name</th>
                <th>Category</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `feedback`";
                    $result = mysqli_query($connect, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                ?>
                <tr>
                <td><?=$i?></td>
                <td><?php echo $row["reportNo"] ?></td>
                <td><?php echo $row["tradingName"] ?></td>
                <td><?php echo $row["complaintCat"] ?></td>
                <td>
                    <a href="AdminDisplayReport.php?reportNo=<?php echo $row['reportNo'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="table__icon">
                            <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375
                             0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 
                             0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 
                             1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 
                             2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 
                             0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </a>
                    <a href="AdminTimeline.php?reportNo=<?php echo $row['reportNo'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="table__icon">
                            <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 
                            12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 
                            16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            </table>
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