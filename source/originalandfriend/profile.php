
<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&family=Mitr&display=swap" rel="stylesheet">
    <style>
      body{
      font-family: 'Kanit', sans-serif;
      font-family: 'Mitr', sans-serif;
    }
      </style>
	  <div class="content-wrapper">
	    <div class="container">
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3">
	        							<p>ชื่อ:</p>
	        							<p>อีเมลล์:</p>
	        							<p>เบอร์ติดต่อ:</p>
	        							<p>ที่อยู่:</p>
	        							<p>วันที่เข้าร่วม:</p>
	        						</div>
	        						<div class="col-sm-9">
	        							<p><?php echo $user['firstname'].' '.$user['lastname']; ?>
	        								<span class="pull-right">
	        									<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i>แก้ไข</a>
	        								</span>
										</p>
	        							<p><?php echo $user['email']; ?></p>
	        							<p><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></p>
	        							<p><?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></p>
	        							<p><?php echo date('M d, Y', strtotime($user['created_on'])); ?></p>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
					</div>
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered" id="example1">
	        					<thead>
	        						<th class="hidden"></th>
	        						<th>Date</th>
	        						<th>Transaction#</th>
	        						<th>Amount</th>
	        						<th>Full Details</th>
	        					</thead>
	        					<tbody>
	        					<?php
	        						$conn = $pdo->open();

	        						try{
	        							$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        								$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
	        								$stmt2->execute(['id'=>$row['id']]);
	        								$total = 0;
	        								foreach($stmt2 as $row2){
	        									$subtotal = $row2['price']*$row2['quantity'];
	        									$total += $subtotal;
	        								}
	        								echo "
	        									<tr>
	        										<td class='hidden'></td>
	        										<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
	        										<td>".$row['pay_id']."</td>
	        										<td>".number_format($total, 2)." บาท</td>
	        										<td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        									</tr>
	        								";
	        							}

	        						}
        							catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

	        						$pdo->close();
	        					?>
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        	</div>
	        	
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>