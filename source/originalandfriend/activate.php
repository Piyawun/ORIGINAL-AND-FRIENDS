<?php include 'includes/session.php'; ?>
<?php
	$output = '';
	if(!isset($_GET['code']) OR !isset($_GET['user'])){
		$output .= '
			<div class="alert alert-danger">
                <h4><i class="icon fa fa-warning"></i> Error!</h4>
                ไม่พบรหัสเพื่อเปิดใช้งานบัญชี.
            </div>
            <p>คุณจะกลับไปหน้า <a href="signup.php">สมัครสมาชิก</a> หรือ <a href="index.php">หน้าแรก</a>.</p>
		'; 
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
		$stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){
				$output .= '
					<div class="alert alert-danger">
		                <h4><i class="icon fa fa-warning"></i> Error!</h4>
		                ไม่พบรหัสเพื่อเปิดใช้งานบัญชี.
		            </div>
		            <p>คุณจะกลับไปหน้า <a href="signup.php">สมัครสมาชิก</a> หรือ <a href="index.php">หน้าแรก</a>.</p>
				';
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['id']]);
					$output .= '
						<div class="alert alert-success">
			                <h4><i class="icon fa fa-check"></i> Success!</h4>
			                เปิดใช้งานบัญชี - อีเมล: <b>'.$row['email'].'</b>.
			            </div>
			            <p>คุณจะกลับไปหน้า <a href="login.php">เข้าสู่ระบบ</a> หรือ <a href="index.php">หน้าแรก</a>.</p>
					';
				}
				catch(PDOException $e){
					$output .= '
						<div class="alert alert-danger">
			                <h4><i class="icon fa fa-warning"></i> Error!</h4>
			                '.$e->getMessage().'
			            </div>
			            <p>คุณจะกลับไปหน้า <a href="signup.php">Signup</a> หรือ <a href="index.php">หน้าแรก</a>.</p>
					';
				}

			}
			
		}
		else{
			$output .= '
				<div class="alert alert-danger">
	                <h4><i class="icon fa fa-warning"></i> Error!</h4>
	                ไม่สามารถเปิดใช้งานบัญชี รหัสผิด.
	            </div>
	            <p>คุณจะกลับไปหน้า <a href="signup.php">Signup</a> หรือ <a href="index.php">หน้าแรก</a>.</p>
			';
		}

		$pdo->close();
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
	        		<?php echo $output; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>