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
		//include "connectdb/connect.php";
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

  /*if(isset($_SESSION['email']) && $_SESSION['type']==0){
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
  /*} apus comment disini dan 109 biar session jalan
  else{
      echo "<script type='text/javascript'>window.alert('Please Log in');</script>";
  		header('location:login.html');
  }*/
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
          <li>
            <a href="#transactions" data-toggle="tab">Completed Transactions</a>
          </li>
        </ul>
        <br>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="users">
          <?php
            /*mulai dari sini sampe line 191 jangan diapapain
            $email= $_SESSION['email'];
            $que="SELECT * FROM user ";
            $value = mysql_query($que); // Send to DB
            $value = mysql_fetch_array($value); // Get result
            $id = $value[0];
            */
            /*
            $query = "SELECT * FROM user";
            $result = mysql_query($query);

            echo "<div class='row text-center'>";
            echo"<form action='admin.php' method='post'>";

            foreach ($_POST as $key => $value) {
                $del = "UPDATE user set status= 1 WHERE user_id = '$key'";
                $delque = mysql_query($del);
                header("Refresh:0;");
              }

            while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
                //$url= $row['pd_path'];
            echo "
                <div class='col-md-3 col-sm-6 hero-feature'>
                    <div class='thumbnail'>
                        <div class='caption'>
                            <p>ID: ".$row['user_id']."</p>
                            <p>First Name: ".$row['user_fname']."</p>
                            <p>Last Name: ".$row['user_lname']."</p>
                            <p>Email: ".$row['user_email']."</p>
                            <p>
                                <div>
                                  <input type=\"submit\" class='btn btn-primary btn-lg btn btn-danger' role='button' name=".$row['user_id']." value =\"Remove\" onclick=\"return confirm('Are you sure you want to Remove ".$row['user_fname']."?');\">
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
            */?>
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
                <th>Account Number</th>
                <th>Action</th>

              </tr>
              <tr>
                <td>9</td>
                <td>Buyer & Seller</td>
                <td>Caesar</td>
                <td>Adyatma</td>
                <td>caesar@caesar.com</td>
                <td>Ciputat</td>
                <td>user/caesar@caesar.com_9</td>
                <td>BCA</td>
                <td>23727310</td>
                <!-- dibawah ini jadiin tombol buat hyperlink aja -->
                <td><input type='submit' value='Delete'></td>

              </tr>
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
                <tr>
                  <td>2</td>
                  <td>5</td>
                  <td>9</td>
                  <td>1</td>
                  <td>1/19/2017</td>
                  <td>2/19/2017</td>
                  <td>IDR 5000</td>
                  <td>unpaid</td><!--paid,unpaid,ship,waitingforshipping-->
                  <td></td>
                  <td><select name='#'>
                    <option value='1'>None</option>
                    <option value='2'>Paid</option>
                    <option value='3'>Shipped</option>
                  </select></td>
                  <td><input type='submit' name='#' value='Update'></td>
              </tr>

            </table>

                <!-- jangan diapapain
                    <form action="admin.php">
                -->
                <?php
                  /*dari sini sampe 278 jangan diapapain
                  $query = "SELECT * FROM order";
                  $result = mysql_query($query);

                  foreach ($_POST as $key => $value) {
                    //-1 = expire
                    //0 = unpaid
                    //1 = paid
                    //2 = shipped
                    $del = "UPDATE order set status= 1 WHERE user_id = '$key'";
                    $delque = mysql_query($del);
                    header("Refresh:0;");
                  }

                  while($row1 = mysql_fetch_array($result)){   //Creates a loop to loop through results

                    echo"
                      <tr>
                        <td>".$row1['order_id']."</td>
                        <td>".$row1['order_buyerId']."</td>
                        <td>".$row1['order_sellerId']."</td>
                        <td>".$row1['order_productId']."</td>
                        <td>".$row1['order_date']."</td>
                        <td>".$row1['order_status']."</td>
                        <td>".$row1['order_tracking']."</td>
                        <td><select name='#'>
                          <option value='1'>None</option>
                          <option value='2'>Paid</option>
                          <option value='3'>Shipped</option>
                        </select></td>
                        <td><input type='submit' name='#' value='Update'></td>
                    </tr>";
                  }
                  */?>
              <!--</table>
            </form>-->
            <

          </div>
          <div class="tab-pane" id="products">
            <table>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Seller ID</th>
                <th>Action</th>

              </tr>
              <tr>
                <td>1</td>
                <td>Sendal Jepit</td>
                <td>Image</td>
                <td>IDR 5000</td>
                <td>9</td>
                <td><input type='submit' value='Delete'></td>

              </tr>
            </table>
          </div>
            <div class="tab-pane" id="transactions">
              <table>
                <tr>
                  <th>Order ID</th>
                  <th>Buyer ID</th>
                  <th>Seller ID</th>
                  <th>Product ID</th>
                  <th>Tracking Number</th>
                  <th>Order Date</th>
                  <th>Payment Date</th>
                  <th>Payment Amount</th>
                  <th>Seller Payment</th>
                  <th>Action</th>
                  <th>Update</th>
                </tr>
                <tr>
                  <td>2</td>
                  <td>5</td>
                  <td>9</td>
                  <td>1</td>
                  <td>237858648</td>
                  <td>1/19/2017</td>
                  <td>2/19/2017</td>
                  <td>IDR 5000</td>
                  <td>Unpaid</td>
                  <td><select name='#'>
                    <option value='1'>Unpaid</option>
                    <option value='2'>Paid</option>

                  </select></td>
                  <td><input type='submit' name='#' value='Update'></td>
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
