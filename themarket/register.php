<?php
	include 'connectdb/connect.php';
	error_reporting(E_ERROR | E_PARSE);
	
	
	
	function register(){
	

    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
	$address = $_POST['address'];
	//$pnumber= $_POST['pnumber'];
	$pass= $_POST['pass'];
	$salt= hash('ripemd128', time().$pass.rand(0,100));
	$pass = md5($salt.$pass);
	
	//$total= $tixamount * $presale1
	$type= 1;
	//$banstatus= 0;
	//$date= date("Y-m-d H:i:s");
	
	//$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
	//$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
	//$encryptedPass = openssl_encrypt($pass, $encryptionMethod, $secretHash);
	$result= mysql_query("SELECT count(email) as valid from user WHERE email='$email'");
	$data=mysql_fetch_assoc($result);
	
	if($data['valid']==1){
				echo"<script type='text/javascript'>window.alert('Your email is used already, please register a different email');</script>";
				echo "<script type='text/javascript'> window.location.replace(\"login.html\");</script>";
	}
	else{
			$str = "INSERT INTO user (user_type, user_fname, user_lname, user_email, user_address, user_pass, user_salt)
			VALUES ('$type','$fname', '$lname', '$email', '$address', '$pass','$salt') ";
			mysql_query($str);
			$str = mysql_query("SELECT user_id as user_id from user WHERE user_email= '$email'");
			$data= mysql_fetch_assoc($str);
			//make file according with user id and email
			if (!file_exists('user/'.$email.'_'.$data['user_id'])) {
    			mkdir('user/'.$email.'_'.$data['user_id'], 0777, true);
    			$user_dir = 'user/'.$email.'_'.$data['user_id'];
				$str= "UPDATE user SET user_dir = '$user_dir' WHERE user_email= '$email'";
				mysql_query($str);
			}
			

			echo "<script type='text/javascript'>window.alert('Registration Succesful please login');</script>";
			echo "<script type='text/javascript'> window.location.replace(\"login.html\");</script>";
	}
	
    
	
	//echo $pass;
	//echo $encryptedPass;
	
  }
  
  if(isset($_POST['register'])){
    register();
  }
?>