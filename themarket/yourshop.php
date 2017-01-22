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

    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even){background-color: #f2f2f2}

      th {
        background-color: #ffcc00;
        color: white;
      }
    </style>
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
              <a href="#transactions" data-toggle="tab">Completed Transactions</a>
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
              <table>
                <tr>
                  <th>Order ID</th>
                  <th>Buyer Email</th>
                  <th>Product Name</th>
                  <th>Order Date</th>
                  <th>Payment Date</th>
                  <th>Payment Amount</th>
                  <th>Status</th><!--paid,unpaid,ship,waitingforshipping-->
                  <th>Tracking Number</th>
                  <th>Enter Tracking Number</th>
                  <th>Update</th>
                </tr>
                <tr>
                  <td>2</td>
                  <td>nadya@nadya.com</td>
                  <td>Supreme Hoodie</td>
                  <td>1/19/2017</td>
                  <td>2/19/2017</td>
                  <td>IDR 5000</td>
                  <td>unpaid</td><!--paid,unpaid,ship,waitingforshipping-->
                  <td></td>
                  <td><input type='text' name='#'></td>
                  <td><input type='submit' name='#' value='Update'></td>
              </tr>

            </table>

              <!--
                order id, pengorder, quantity, total harga, limit tanggal untuk
                masukin nomor resi, tombol untuk masukin nomor resi
              -->
    				</div>
            <div class="tab-pane" id="transactions">
              <table>
                <tr>
                  <th>Order ID</th>
                  <th>Buyer Email</th>
                  <th>Product Name</th>
                  <th>Order Date</th>
                  <th>Payment Date</th>
                  <th>Payment Amount</th>
                  <th>Status</th><!--paid,unpaid,ship,waitingforshipping-->
                  <th>Tracking Number</th>


                </tr>
                <tr>
                  <td>2</td>
                  <td>nadya@nadya.com</td>
                  <td>Supreme Hoodie</td>
                  <td>1/19/2017</td>
                  <td>2/19/2017</td>
                  <td>IDR 5000</td>
                  <td>Shipped</td><!--paid,unpaid,ship,waitingforshipping-->
                  <td>23353434</td>


              </tr>

            </table>
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
