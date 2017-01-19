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
	<?php
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
				header('location:admin.php');
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
    <!-- Page Content -->
    <div class='container'>

        <!-- Page Header -->
        <div class='row'>
            <div class='col-lg-12'>
                <h1 class='page-header'>Your Shop
                    <small>Personalize Your Shop</small>
                </h1>
            </div>

        </div>

        <div class="col-lg-12" style="margin-bottom:15px;">
          <a class='btn btn-primary btn-lg' href='productform.php' role='button'>Add Products</a>
          <a class='btn btn-primary btn-lg btn btn-warning' href='#' role='button'>Modify Products</a>
        </div>
        <div class="col-lg-12">
          <ul  class="nav nav-tabs">
      			<li class="active">
              <a  href="#products" data-toggle="tab">Products</a>
      			</li>
      			<li>
              <a href="#orders" data-toggle="tab">Orders</a>
      			</li>
      			<li>
              <a href="#3a" data-toggle="tab">Tab 3</a>
      			</li>
        		<li>
              <a href="#4a" data-toggle="tab">Tab 4</a>
      			</li>
      		</ul>

  			<div class="tab-content clearfix">
  			  <div class="tab-pane active" id="products">
            <?php
              $email= $_SESSION['email'];
              $que="SELECT user_id FROM user WHERE user_email = '$email'";
              $value = mysql_query($que); // Send to DB
              $value = mysql_fetch_array($value); // Get result
              $id = $value[0];


              $query = "SELECT * FROM product WHERE status = 0 AND user_id ='$id' ";
              $result = mysql_query($query);

              echo "<div class='row text-center'>";
              echo"<form action='yourshop.php' method='post'>";

              foreach ($_POST as $key => $value) {
      						$del = "UPDATE product set status= 1 WHERE pd_id = '$key'";
      						$delque = mysql_query($del);
                  header("Refresh:0;");
      					}

              while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
                  $url= $row['pd_path'];
              echo "

                  <div class='col-md-3 col-sm-6 hero-feature'>
                      <div class='thumbnail'>
                          <img style='height:200px;width:400px;' class= 'img-responsive' src=".$url." alt='".$row['pd_name']."'>
                          <div class='caption'>
                              <h3>".$row['pd_name']."</h3>
                              <p>".$row['pd_details']."</p>
                              <p>IDR ".$row['pd_price']."</p>
                              <p>
                                  <div>
                                    <input type=\"submit\" class='btn btn-primary btn-lg btn btn-danger' role='button' name=".$row['pd_id']." value =\"Remove\" onclick=\"return confirm('Are you sure you want to Remove ".$row['pd_name']."?');\">
                                  </div>
                                  <div style='margin-top:15px'>
                                    <a class='btn btn-primary btn-lg btn btn-warning' href='#' role='button'>Modify</a>
                                  </div>
                              </p>

                          </div>
                      </div>
                  </div>

                  ";

              }
              echo"</form>";
              echo "</div>";
              ?>

    				</div>
    				<div class="tab-pane" id="orders">
              <h3>ini di isi list orderan dan status</h3>
              <!--
                order id, pengorder, quantity, total harga, limit tanggal untuk
                masukin nomor resi, tombol untuk masukin nomor resi
              -->
    				</div>
            <div class="tab-pane" id="3a">
              <h3>ini gatau di isi apa</h3>
    				</div>
              <div class="tab-pane" id="4a">
              <h3>in juga gatau mau di isi apa</h3>
    				</div>
    			</div>
      </div>
          <!-- /.row -->
          <!--Projects Row-->
          <hr>

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
