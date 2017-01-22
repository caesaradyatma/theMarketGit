<?php
	include 'connectdb/connect.php';
	ob_start();

	function login(){
		//$encryptionMethod = "AES-256-CBC";  // AES is used by the U.S. gov't to encrypt top secret documents.
		//$secretHash = "25c6c7ff35b9979b151f2136cd13b0ff";
		if (!empty($_POST['email']) AND !empty($_POST['pass'])){
		  $email= $_POST['email'];
		  $pass= $_POST['pass'];
		  //$encryptedPass = openssl_encrypt($pass, $encryptionMethod, $secretHash);
		  //$decryptedPass = openssl_decrypt($encryptedPass, $encryptionMethod, $secretHash);

		  //get user salt and pass
		  $que = "SELECT user_salt FROM user WHERE user_email = '$email'";
		  $result = mysql_query($que); // Send to DB
          $result = mysql_fetch_array($result); // Get result
          $salt = $result[0]; // Save result
		  $pass = md5($salt.$pass);

		  //get user type
		  $que="SELECT user_type FROM user WHERE user_email = '$email'";
		  $result = mysql_query($que); // Send to DB
          $result = mysql_fetch_array($result); // Get result
          $type = $result[0]; // Save result

		  if($type == 0){//admin
			$result=mysql_query("SELECT count(user_email) as valid from user WHERE user_pass='$pass'");
			$data=mysql_fetch_assoc($result);

			//$count= mysql_query($que);
			if($data['valid']==1){
				//alert('sukses bor');
				$_SESSION['email']=$email;
				$_SESSION['type']= $type;
				header('location:admin.php');
			}

			else{
				echo"<script type=text/javascript>window.alert('Incorrect email or password');</script>";
				echo "<script type='text/javascript'> window.location.replace(\"login.html\");</script>";
			}
		  }

		  else if($type== 1 || $type== 2){//user

			$result=mysql_query("SELECT count(user_email) as valid from user WHERE user_pass='$pass'");
			$data=mysql_fetch_assoc($result);

			//echo $data['valid'];
			//$count= mysql_query($que);
			if($data['valid']==1){
				//alert('sukses bor');
				$_SESSION['email']=$email;
				$_SESSION['type']= $type;
				header('location:index.php');
			}
			else{
				echo"<script type=text/javascript>window.alert('Incorrect email or password');</script>";
				echo "<script type='text/javascript'> window.location.replace(\"gate.html\");</script>";
			}

		  }

		  //$array = mysql_query($que);
		  //$ar = mysql_fetch_array($array);
		  //Nested IF
		  //SET Email or Session as ID
		  /*if (!empty($ar['email']) AND !empty($encryptedPass)){
			$_SESSION['email'] = $ar['email'];
			//$_SESSION['type'] = $ar['type'];
			//header('location: index.php');
			echo "<script type=text/javascript> window.location.replace ('../webpages/gate.html');</script>";
		  }*/
		  /*else {
			echo "<script type=text/javascript>
			alert('Incorrect email and or password please try again');
			window.location.replace(\"gate.html\");
			</script>";
		  }*/
		}
    else /*if(empty($_POST['un']) OR empty($_POSTY['pw']))*/{
      echo"<script type=text/javascript>
      alert('Please fill all the forms')
      window.location.replace(\"gate.html\")";
      //echo "javascript:alert('sasdasddadad')" then redirects to owner login page
    }
  }

  if (isset($_POST['login'])){
    login();
  }
?>
