<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Your Shop - themarket</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <?php
  include "connectdb/connect.php";
	if(isset($_SESSION['email'])){
			if($_SESSION['type']==0){
				header('location:indexadmin.php');
			}
      else if($_SESSION['type']==1){
        include "navbar.php";
      }
  }
      else{
        echo"
      			<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
              <div class='container'>
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class='navbar-header'>
                      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                          <span class='sr-only'>Toggle navigation</span>
                          <span class='icon-bar'></span>
                          <span class='icon-bar'></span>
                          <span class='icon-bar'></span>
                      </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                  <ul class='nav navbar-nav'>
                      <li>
                          <a href='index.php'>Home</a>
                      </li>
  					          <li>
                          <a href='#'><input type='text' placeholder='search for products'></a>
                      </li>
                      <li>
                          <a href='#'>Sign Up</a>
                      </li>
                      <li>
                          <a href='login.html'>Log In</a>
                      </li>
                      <!--<li>
                          <a href='#'>Contact</a>
                      </li>-->
                  </ul>
              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
      </nav>";
        }

        function addbankacc(){
          $acc_name = $_POST['acc_name'];
          $acc_bank = $_POST['acc_bank'];
          $acc_number = $_POST['acc_number'];
          $email= $_SESSION['email'];
          $que="SELECT user_id FROM user WHERE user_email = '$email'";
            $result = mysql_query($que); // Send to DB
            $result = mysql_fetch_array($result); // Get result
            $id = $result[0];
          $str = "INSERT INTO account (user_id, account_name, account_bank, account_number)
  							VALUES ('$id','$acc_name','$acc_bank', '$acc_number') ";
  				mysql_query($str);
          $que = "UPDATE user set user_status= 1 WHERE user_id = '$id'";
          $sql = mysql_query($que);
          echo "<script type='text/javascript'>window.alert('Data Input Succesful');</script>";
          echo "<script type='text/javascript'> window.location.replace(\"yourshop.php\");</script>";
        }
      ?>

    <!-- Page Content -->
    <div class='container'>

        <!-- Page Header -->
        <div class='row'>
            <div class='col-lg-12'>
                <h1 class='page-header'>Add Bank Account Form
                    <small>Please Fill The Information Below To Be a Seller,
                    for more information <a href="#">click here</a></small><br>
                </h1>
            </div>
        </div><br>
        <!-- /.row -->
		<center>
		<div class='col-lg-12'>
			<form action='addbankacc.php' method='POST' enctype='multipart/form-data'>
				<table>
					<tr>
						<td><input type='text' name='acc_name' placeholder='Account Owner' required><br></td>
					</tr>
					<tr>
						<td><input type='text' name='acc_bank' placeholder='Name of Bank' required></td>
					</tr>
					<tr>
						<td><input type='number' name='acc_number' placeholder='Account Number' required></td>
					</tr>
					<tr>
						<td><input type='submit' name='bankaccform' value='submit'></td>
					</tr>
				</table>
			</form>
		</div>
		</center>
        <!-- Footer -->
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>

    <?php
      if(isset($_POST['bankaccform'])){
        addbankacc();
      }
    ?>
</body>

</html>
