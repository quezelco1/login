<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contact']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fname = validate($_POST['fname']);
	$lname = validate($_POST['lname']);
	$contact = validate($_POST['contact']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);


	$user_data = 'email='. $email. '&fname='. $fname;

	if (empty($fname)) {
		header("Location: signup.php?error=First Name is required&$user_data");
	    exit();
	}
	if (empty($lname)) {
			header("Location: signup.php?error=Last Name is required&$user_data");
			exit();
	}
	if (empty($contact)) {
				header("Location: signup.php?error=Contact is required&$user_data");
				exit();
	}
	if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
	    exit();
		
	}else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}
	else if($password !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(fname, lname, contact, email, password) 
		   VALUES('$fname', '$lname','$contact', '$email', '$password')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}