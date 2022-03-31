<?php include 'includes/session.php'; ?>
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
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		
                    <h2>เครือ Louis Vuitton จะเปลี่ยนโรงงานน้ำหอมมาผลิต ‘แอลกอฮอล์เจล’ ช่วยฝรั่งเศสสู้วิกฤตโควิด-19</h2>
                    <img src="images/blog/Vuitton1.jpg">
                    <br><br>
                    <?php
                        echo "อาณาจักรธุรกิจสินค้าหรูหรา LVMH ซึ่งเป็นเจ้าของแบรนด์หรูคุ้นหูอย่าง Louis Vuitton, Dior และ Fenty Beauty ออกแถลงการณ์จะเปลี่ยนโรงงานน้ำหอมและ
                        เครื่องสำอางที่ผลิตให้กับแบรนด์ต่างๆ เช่น Guerlain, Christian Dior และ Givenchy ในฝรั่งเศส มาผลิต ‘แอลกอฮอล์เจล’ ช่วยฝรั่งเศสสู้วิกฤตโควิด-19
                        ทิศทางของแบรนด์หรูเกิดขึ้นหลังแดนน้ำหอมเผชิญกับการแพร่ระบาดของโควิด-19 อย่างหนัก จนทำให้มีผู้ติดเชื้อ 3,600 ราย และผู้เสียชีวิต 79 ราย 
                        อีกทั้งยังก่อให้เกิดการขาดแคลนแอลกอฮอล์เจล
                        ตามแถลงการณ์ระบุว่า การผลิตแอลกอฮอล์เจลจะเริ่มขึ้นในวันจันทร์ที่ 16 มีนาคม (ตามเวลาท้องถิ่น) โดยสินค้าที่ได้จากการผลิตในครั้งนี้จะถูกบริจาคให้
                        กับหน่วยงานด้านสาธารณสุข เพื่อช่วยฝรั่งเศสที่กำลังเพิ่มความพยายามในการหยุดการแพร่กระจายของโควิด-19 โดยไม่ได้ผลิตมาเพื่อจำหน่ายแต่อย่างใด";
                    ?>
                   
                       <?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

                        $pdo->close();

                        

		       		?> 
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