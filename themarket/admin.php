<?php
  ob_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page The Market</title>

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
  //get user status
  /*$email= $_SESSION['email'];
  $que="SELECT user_status FROM user WHERE user_email = '$email'";
    $result = mysql_query($que); // Send to DB
    $result = mysql_fetch_array($result); // Get result
    $user_status = $result[0];
  if($user_status == 0){
    echo "<script type='text/javascript'>window.alert('You must fill bank account information to access yourshop feature!\nPress OK to fill the form\nPress Cancel to go back');</script>";
    echo "<script type='text/javascript'> window.location.replace(\"index.php\");</script>";
  }*/

  if(isset($_SESSION['email']) && $_SESSION['type']==0){
			//if($_SESSION['type']==0){*///apus comment ini biar session jalan
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
                        <a href='admin.php'>Home</a>
                    </li>
                    <li>
                        <a href='#''>Welcome Admin</a>
                    </li>
                    <li>
                        <a href='#'><input type='text' placeholder='search for products'></a>
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
    </nav>";
			//}
      /*else if($_SESSION['type']==1){
        include "navbar.php";
      }*/
  } //apus comment disini dan 109 biar session jalan
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
              <h1 class='page-header'>Admin Page
                  <small>Information shown here are classified</small>
              </h1>
          </div>

      </div>


      <div class="col-lg-12">
        <ul  class="nav nav-tabs">
          <li class="active">
            <a  href="#users" data-toggle="tab">Users</a>
          </li>
          <li>
            <a href="#orders" data-toggle="tab">Orders</a>
          </li>
          <li>
            <a href="#products" data-toggle="tab">Products</a>
          </li>

        </ul>
        <br>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="users">

            <!--ini table buat list user -->
            <!-- Tambahin isinya aja -->
            <table>
              <tr>
                <th>ID</th>
                <th>User Type</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>File Directory</th>
                <th>Bank Name</th>
                <th>Account Owner</th>
                <th>Account Number</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <?php
                $query = "SELECT * FROM user";
                $result = mysql_query($query);//user table


                echo"<form action='admin.php' method='post'>";

                foreach ($_POST as $key => $value) {
                    $del = "UPDATE user set user_status= 1 WHERE user_id = '$key'";
                    $delque = mysql_query($del);
                    header("Refresh:0;");
                }

                while($row = mysql_fetch_array($result)){
                  //to connect bank account info
                  $id = $row['user_id'];
                  $q = "SELECT * FROM account WHERE user_id = $id";
                  $hasil = mysql_query($q);//account table
                  $row1 = mysql_fetch_array($hasil);

                  //to display user type
                  if($row['user_type'] == 1){
                    $type = "Buyer";
                  }
                  else if($row['user_type'] == 0){
                    $type = "Admin";
                  }
                  else if($row['user_type'] == 2){
                    $type = "Buyer and Seller";
                  }

                  if($row['user_status'] == 1){
                    $status = "Suspended";
                  }
                  else if($row['user_status'] == 0){
                    $status = "Active";
                  }

                  echo"
              <tr>
                <td>".$row['user_id']."</td>
                <td>".$type."</td>
                <td>".$row['user_fname']."</td>
                <td>".$row['user_lname']."</td>
                <td>".$row['user_email']."</td>
                <td>".$row['user_address']."</td>
                <td>".$row['user_dir']."</td>
                <td>".$row1['account_bank']."</td>
                <td>".$row1['account_name']."</td>
                <td>".$row1['account_number']."</td>
                <td>".$status."</td>
                <!-- dibawah ini jadiin tombol buat hyperlink aja -->
                <td><input type=\"submit\" class='btn btn-primary btn-lg btn btn-danger' role='button' name=".$row['user_id']." value =\"Suspend\" onclick=\"return confirm('Are you sure you want to Remove ".$row['user_fname']."?');\"></td>

              </tr>";
            }
            ?>
            </table>



          </div>
          <div class="tab-pane" id="orders">

            <!--
              order id, pengorder, quantity, total harga, limit tanggal untuk
              masukin nomor resi, tombol untuk masukin nomor resi
            -->
            <!-- ini table buat list order tambahin isinya aja -->
              <table>
                <tr>
                  <th>Order ID</th>
                  <th>Buyer ID</th>
                  <th>Seller ID</th>
                  <th>Product ID</th>
                  <th>Order Date</th>
                  <th>Payment Date</th>
                  <th>Payment Amount</th>
                  <th>Status</th><!--paid,unpaid,ship,waitingforshipping-->
                  <th>Tracking Number</th>
                  <th>Action</th>
                  <th>Update</th>
                </tr>
              </tr>
              <?php
                $query = "SELECT * FROM order";
                $result = mysql_query($query);//user table


                echo"<form action='admin.php' method='post'>";

                foreach ($_POST as $key => $value) {
                    $del = "UPDATE order set status= 1 WHERE user_id = '$key'";
                    $delque = mysql_query($del);
                    header("Refresh:0;");
                }

                while($row = mysql_fetch_array($result)){

                  //to display order status
                  if($row['order_status'] == 0){
                    $order_status = "Unpaid";
                  }
                  else if($row['order_status'] == 1){
                    $order_status = "Paid";
                  }
                  else if($row['order_status'] == 2){
                    $order_status = "Sent";
                  }

                  else if($row['order_status'] == 3){
                    $order_status = "Received";
                  }
                  else if($row['order_status'] == 4){
                    $order_status = "Seller Paid";
                  }

                  echo"
              <tr>
                <td>".$row['order_id']."</td>
                <td>".$row['order_buyerEmail']."</td>
                <td>".$row['order_sellerEmail']."</td>
                <td>".$row['order_date']."</td>
                <td>".$row['order_paydate']."</td>
                <td>".$row['order_payAmount']."</td>
                <td>".$order_status."</td>
                <td>".$row['order_trackingNum']."</td>
                <!-- dibawah ini jadiin tombol buat hyperlink aja -->
                <td><input type=\"submit\" class='btn btn-primary btn-lg btn btn-danger' role='button' name=".$row['user_id']." value =\"Suspend\" onclick=\"return confirm('Are you sure you want to Remove ".$row['user_fname']."?');\"></td>

              </tr>";
            }
            ?>
            </table>

          </div>
          <div class="tab-pane" id="products">
            <table>
              <tr>
                <th>ID</th>
                <th>Seller ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Details</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>

              </tr>
              <?php
                $query = "SELECT * FROM product";
                $result = mysql_query($query);//user table


                echo"<form action='admin.php' method='post'>";

                foreach ($_POST as $key => $value) {
                    $del = "UPDATE product set status = 1 WHERE user_id = '$key'";
                    $delque = mysql_query($del);
                    header("Refresh:0;");
                }

                while($row = mysql_fetch_array($result)){

                  echo"
                    <tr>
                      <td>".$row['pd_id']."</td>
                      <td>".$row['user_id']."</td>
                      <td>".$row['cat_id']."</td>
                      <td>".$row['pd_name']."</td>
                      <td>".$row['pd_details']."</td>
                      <td>".$row['pd_price']."</td>
                      <td><img style= 'height:200px; width:200px;'src='".$row['pd_path']."'></td>
                      <!-- dibawah ini jadiin tombol buat hyperlink aja -->
                      <td><input type=\"submit\" class='btn btn-primary btn-lg btn btn-danger' role='button' name=".$row['pd_id']." value =\"Remove\" onclick=\"return confirm('Are you sure you want to Remove ".$row['pd_name']."?');\"></td>
                    </tr>";
                }
            ?>
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
