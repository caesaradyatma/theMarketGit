<?php
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to The Market</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

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

    <!-- Navigation -->
	<?php
	if(isset($_SESSION['email'])){
			if($_SESSION['type']==0){//buat admin tp belom ada
				header('location:indexadmin.php');
			}
      else if($_SESSION['type']==1 || $_SESSION['type']==2){//registered user
        include "navbar.php";
      }
  }
      else{//user belom register
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
                          <a href='register.html'>Sign Up</a>
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

      ?>

    <!-- Page Content -->

    <div class='container'>
        <?php
          $email= $_SESSION['email'];
          $que="SELECT user_type FROM user WHERE user_email = '$email'";
            $result = mysql_query($que); // Send to DB
            $result = mysql_fetch_array($result); // Get result
          $user_type = $result[0];

          if($user_type != 2){//kalo user belom isi form penjual(bank account)
            echo"
            <header class='jumbotron hero-spacer'>
                <h1>Welcome to The Market!</h1>
                <p>Start shopping by searching your desired products on the search bar, or click open shop if you want to sell your stuff!</p>
                <p><a class='btn btn-primary btn-large' href='addbankacc.php'>Open A Shop!</a>
                </p>
            </header>";
          }
          else if($user_type == 2){//kalo user udah isi form penjual
            echo "
              welcome back!
            ";//kasih display
          }
        ?>

        <hr>

        <!-- Title -->
        <div class='row'>
            <div class='col-lg-12'>
                <h3>Hot Products</h3><!--nanti gua tambahin-->
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class='row text-center'>

            <div class='col-md-3 col-sm-6 hero-feature'>
                <div class='thumbnail'>
                    <img src='http://placehold.it/800x500' alt=''>
                    <div class='caption'>
                        <h3>Product Name</h3>
                        <p>Descripton and Price</p>
                        <p>
                            <a href='#' class='btn btn-primary'>Buy Now!</a> <a href='#' class='btn btn-default'>More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class='col-md-3 col-sm-6 hero-feature'>
                <div class='thumbnail'>
                    <img src='http://placehold.it/800x500' alt=''>
                    <div class='caption'>
                        <h3>Product Name</h3>
                        <p>Description and Price</p>
                        <p>
                            <a href='#' class='btn btn-primary'>Buy Now!</a> <a href='#' class='btn btn-default'>More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class='col-md-3 col-sm-6 hero-feature'>
                <div class='thumbnail'>
                    <img src='http://placehold.it/800x500' alt=''>
                    <div class='caption'>
                        <h3>Product Name</h3>
                        <p>Description and Price</p>
                        <p>
                            <a href='#' class='btn btn-primary'>Buy Now!</a> <a href='#' class='btn btn-default'>More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class='col-md-3 col-sm-6 hero-feature'>
                <div class='thumbnail'>
                    <img src='http://placehold.it/800x500' alt=''>
                    <div class='caption'>
                        <h3>Product Name</h3>
                        <p>Description and Price</p>
                        <p>
                            <a href='#' class='btn btn-primary'>Buy Now!</a> <a href='#' class='btn btn-default'>More Info</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Copyright &copy; themarket.com 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>




</body>

</html>
