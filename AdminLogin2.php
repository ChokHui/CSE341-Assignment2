<?php
	session_start();
	include ('dbconfig.php');

	if (isset($_POST['uname']) && isset($_POST['password'])) {
		
		$uname = $_POST['uname'];
		$pass = $_POST['password'];
		
		if(empty($uname)) {
			header("Location: AdminLogin.php?error=Username is required");
			exit();
		}else if (empty($pass)) {
			header("Location: AdminLogin.php?error=Password is required");
			exit();
		}else {
			$stmt = mysqli_prepare($connect, "SELECT * FROM admin WHERE username=? AND password=?");
			
			// Bind the parameters to the statement
			mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
			
			// Execute the statement
			mysqli_stmt_execute($stmt);
			
			// Get the result
			$result = mysqli_stmt_get_result($stmt);
			
			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['username'] === $uname && $row['password'] === $pass) {
					$_SESSION['username'] = $row['username'];
					$_SESSION['user'] = $row['user'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['role'];
					
					header("Location: index.php");
					exit();
				}else {
					header("Location: AdminLogin.php?error=Incorrect Username or Password");
					exit();
				}
			}else{
				header("Location: AdminLogin.php?error=Incorrect Username or Password");
				exit();
			}
		}
	}else{
		header("Location: AdminLogin.php");
		exit();
	}
?>