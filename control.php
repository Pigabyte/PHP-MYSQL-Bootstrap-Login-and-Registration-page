<?php

include"includes/conn.php";

if(isset($_POST['login'])){
	$username=scan($_POST['userId']);
	$password=scan($_POST['userPass']);

	if(empty($username) || empty($password)){
		die("Please fill all required datas");
	}else{
		$password=md5($password);

		//$checking=$conn->query("Select * from hospitals where userId='".$username."' and userPass='".$password."'");

		if($stmt=$conn->query("SELECT * from users where userId='$username' and userPass='$password'")){
			if($stmt->num_rows>0){
				die("Welcome user now we are going to redirect you");
			}else{
				die("not allowed sir or mam");
			}
		}
		

		
	}


}



// registration form accepting

if(isset($_POST['reg'])){
	$username=scan($_POST['userId']);
	$password=scan($_POST['userPass']);
	$email=scan($_POST['userEmail']);
	$hospital=scan($_POST['hospital']);

	if(empty($username) || empty($password) || empty($email) || empty($hospital) ){
		die("please fill in with all your identification");
	}else{
		$password=md5($password);
		$stmt=$conn->prepare("INSERT into users (hospital,email,userId,userPass) VALUES(?,?,?,?)");
		if($stmt->bind_param("ssss",$hospital,$email,$username,$password)){
			$stmt->execute();
			echo "done";
		}else{
			echo "there is some problems";
		}
		
	}


}


?>