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
    <link rel="stylesheet" type="text/css" href="./styles/AdminTenantComponents/hero.css">
    <link rel="stylesheet" type="text/css" href="./styles/AdminTenantComponents/table.css">
    <link rel="stylesheet" type="text/css" href="./styles/utils.css">
    <title>Tenant Feedback Form - Tenant List</title>
</head>
<body>
    <header>
      <?php
        require_once ('AdminHeader.php');
      ?>
    </header>
    <main>
        <section class="hero container">
            <h1 class="hero__title" >Tenant List</h1>
        </section>
        <section class="hero container">
            <button class="table__btn btn" type="button" onclick="location.href='AdminAddTenant.php';" id="add">Add Tenant</button>
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
                <th>Shop Name</th>
                <th>Lot No</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `tenant` ORDER BY tradingName ASC";
                    $result = mysqli_query($connect, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                ?>
                <tr>
                <td><?=$i?></td>
                <td><?php echo $row["tradingName"] ?></td>
                <td><?php echo $row["lotNo"] ?></td>
                <td>
                <a href="AdminEditTenant.php?tenantID=<?php echo $row['tenantID'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="table__icon">
                            <path stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 
                            4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 
                            7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>    
                <a href="deleteTenantData.php?tenantID=<?php echo $row["tenantID"] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="table__icon">
                        <path stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 
                            1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 
                            2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 
                            00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 
                            013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 
                            00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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