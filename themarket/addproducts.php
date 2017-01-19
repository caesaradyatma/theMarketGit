<?php
	include 'connectdb/connect.php';
	//error_reporting(E_ERROR | E_PARSE);

	function addproducts(){

	    $pd_name = $_POST['pd_name'];
		$pd_details = $_POST['pd_details'];
	    $pd_price = $_POST['pd_price'];
	    $pd_cat = $_POST['pd_cat'];


		//$result= mysql_query("SELECT cat_id from productcategory WHERE cat_name='$pd_cat'");
		/*
		$query="SELECT cat_id from productcategory WHERE cat_name='$pd_cat'";
		$result= mysql_query($query);
		//mysql_fetch_assoc($result);
		$data= mysql_fetch_assoc($result);
		$pd_cat = $data["cat_id"];
		*/

		//imageupload
		//get user directory untuk taro image kesitu
		$email= $_SESSION['email'];
		$query="SELECT user_dir from user WHERE user_email='$email'";
		$result= mysql_query($query);
		//mysql_fetch_assoc($result);
		$data= mysql_fetch_assoc($result);
		$target_dir = $data["user_dir"];
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	    // Check if image file is a actual image or fake image
	    if(isset($_POST["prdouctform"])) {
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if($check !== false) {
	            echo "File is an image - " . $check["mime"] . ".";
	            $uploadOk = 1;
	        }
	        else {
	            echo "<script type='text/javascript'>window.alert('The file is not an image, please upload the correct format.');</script>";
	            echo "<script type='text/javascript'> window.location.replace(\"productform.php\");</script>";
	            $uploadOk = 0;
	        }
	    }

	    // Allow certain file formats
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	    && $imageFileType != "gif" ) {
	    	echo "<script type='text/javascript'>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed, please upload the correct format.');</script>";
	        echo "<script type='text/javascript'> window.location.replace(\"productform.php\");</script>";
	        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	        $uploadOk = 0;
	    }
	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	        echo "Sorry, your file was not uploaded.";
	    // if everything is ok, try to upload file
	    } else {
	        //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            	//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        		$email= $_SESSION['email'];
	        		$que="SELECT user_id FROM user WHERE user_email = '$email'";
		  					$result = mysql_query($que); // Send to DB
          			$result = mysql_fetch_array($result); // Get result
          			$id = $result[0];
	            	//rename ($target_file,"products/".$id."_".$pd_name."_".$pd_cat.".".$imageFileType."");
	            	$rand = md5(uniqid().rand());//rename image biar ga timpa timpaan
	            	$pd_path=$target_dir."/".$id."_".$pd_cat."_".$rand.".".$imageFileType."";
	            	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $pd_path);
					$str = "INSERT INTO product (user_id, pd_name, pd_details, pd_price, cat_id, pd_path)
							VALUES ('$id','$pd_name','$pd_details', '$pd_price', '$pd_cat', '$pd_path') ";
					mysql_query($str);
	            echo "<script type='text/javascript'>window.alert('Data Input Succesful');</script>";
				echo "<script type='text/javascript'> window.location.replace(\"yourshop.php\");</script>";

	        //}

	        /*else {
	            echo "Sorry, there was an error uploading your file.";
	        }*/
	    }


  }

  if(isset($_POST['productform'])){
    addproducts();
  }
?>
