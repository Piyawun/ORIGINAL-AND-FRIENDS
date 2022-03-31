<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg">ป้อนอีเมลล์ที่เชื่อมโยงกับบัญชี</p>

    	<form action="reset.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="อีเมลล์" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="reset"><i class="fa fa-mail-forward"></i>ส่ง</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login.php">เข้าสู่ระบบ</a><br>
      <a href="index.php"><i class="fa fa-home"></i>หน้าแรก</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>