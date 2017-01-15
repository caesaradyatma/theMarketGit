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
    	?>
    	<?php//buat nentuin user udh login atau belom
      $email= $_SESSION['email'];
      $que="SELECT user_status FROM user WHERE user_email = '$email'";
        $result = mysql_query($que); // Send to DB
        $result = mysql_fetch_array($result); // Get result
        $user_status = $result[0];
      if($user_status == 0){
        echo "<script type='text/javascript'>window.alert('You must fill bank account information to access yourshop feature!\nPress OK to fill the form\nPress Cancel to go back');</script>";
        echo "<script type='text/javascript'> window.location.replace(\"index.php\");</script>";
      }
      if(isset($_SESSION['email'])){
    			if($_SESSION['type']==0){
    				header('location:indexadmin.php');
    			}
          else if($_SESSION['type']==1){
            include "navbar.php";
          }
      }
          else{
            echo "<script type='text/javascript'>window.alert('Please Log in');</script>";
      			header('location:login.html');
          }
      ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav'>
                    <li>
                        <a href='indexuser.php'>Home</a>
                    </li>
					<li>
                        <a href='#'><input type='text' placeholder='search for products'></a>
                    </li>
                    <li>
                        <a href='#'>Your Shop</a>
                    </li>
                    <li>
                        <a href='#'>Shopping Cart</a>
                    </li>
                    <li>
                        <a href='logout.php'>Log Out</a>
                    </li>
                    <!--<li>
                        <a href='#'>Contact</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class='container'>

        <!-- Page Header -->
        <div class='row'>
            <div class='col-lg-12'>
                <h1 class='page-header'>Add Products Form
                    <small>Please Fill The Information Below</small><br>
                </h1>
            </div>
        </div><br>
        <!-- /.row -->
		<center>
		<div class='col-lg-12'>
			<form action='addproducts.php' method='POST' enctype='multipart/form-data'>
				<table>
					<tr>
						<td><input type='text' name='pd_name' placeholder='Product Name' required><br></td>
					</tr>
					<tr>
						<td><input type='text' name='pd_details' placeholder='Product Details/Description' required></td>
					</tr>
					<tr>
						<td><input type='number' name='pd_price' placeholder='Product Price' required></td>
					</tr>
          <tr>
            <td>Category
                <select name='pd_cat'>
                  <option value='1'>Smartphone</option>
                  <option value='2'>Fashion</option>
                </select>
            </td>
          </tr>
					<!--<tr>
						<td><input type='number' name='pd_stock' placeholder='Product Stock'></td>
					</tr>-->
          <tr>
            <td><input type='file' name='fileToUpload' id='fileToUpload'></td>
          </tr>
					<tr>
						<td><input type='submit' name='productform' value='submit'></td>
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

</body>

</html>
