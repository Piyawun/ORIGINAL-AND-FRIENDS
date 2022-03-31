<header class="main-header">
  <nav class="navbar navbar-light" style="background-color: #456268;">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand">

          <b>Originals&Friend</b></a>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">หน้าแรก</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">แบรนด์สินค้า<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
          <li><a href="blog.php">บทความ</a></li>
          <li><a href="about.php">เกี่ยวกับเรา</a></li>
          <li><a href="contact.php">ติดต่อเรา</a></li>


        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
            <input type="text" class="form-control" id="navbar-search-input" name="keyword"
              placeholder="Search for Product" required>
            <span class="input-group-btn" id="searchBtn" style="display:none;">
              <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
            </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">คุณมี <span class="cart_count"></span> สินค้าในตะกร้า</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">ตะกร้าสินค้า</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile/profile.png';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">โปรไฟล์</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>เข้าสู่ระบบ</a></li>
                <li><a href='signup.php'>สมัครสมาชิก</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>