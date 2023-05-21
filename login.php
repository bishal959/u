<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if($row['role'] == 'admin'){

				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['admin_id'] = $row['id'];
				header('location:admin.php');
	   
			 }elseif($row['role'] == 'user'){
	   
				$_SESSION['user_name'] = $row['name'];
				$_SESSION['user_id'] = $row['id'];
				header('location: html.php');
	   
			 }elseif($row['role'] == 'teacher'){
			$_SESSION['teacher_name'] = $row['name'];
			$_SESSION['teacher_id'] = $row['id'];
			header('location: teacher.php');

			}
	   
		  }else{
			 $message[] = 'incorrect email or password!';
		  }
       
		}
	}
?>