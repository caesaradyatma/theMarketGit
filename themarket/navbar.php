<!-- navbar  buat user, kalo ada yang mau tambahin silahkan-->
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

<a class='navbar-brand' href='#'>Welcome
<?php
echo $_SESSION['email'];

?></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
          <ul class='nav navbar-nav navbar-left'>
              <li>
                  <a href='indexuser.php'>Home</a>
              </li>
              <li>
                <form class="navbar-form navbar-left" action="search.php" method="POST">
                  <div class="form-group">
                    <select name="pd_cat" class="form-control">
                        <option value="0">Category</option>
                        <option value="1">Smartphone</option>
                        <option Value="2">Fashion</option>
                    </select>
                    <input type="text" name="pd_name" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" name="search"class="btn btn-default">Submit</button>
                </form>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href='yourshop.php'>Your Shop</a>
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
