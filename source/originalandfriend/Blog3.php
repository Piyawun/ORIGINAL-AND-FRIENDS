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
	        		
                    <h2>ประวัติของรองเท้า YEEZY</h2>
                    <?php
                        echo "การร่วมมือกับแร็ปเปอร์ระดับโลกระหว่าง Kanye West และ adidas ทำให้เราได้รองเท้าผ้าใบที่เอกลักษณ์ที่สุดตลอดกาล แต่มีอีกหลายสิ่งที่คุณไม่รู้เกี่ยวกับ Yeezy
                        เราจะให้ข้อมูลเชิงลึกเกี่ยวกับ Kanye West x adidas! จากทรงรองเท้าไปจนถึงเรื่องราวที่อยู่เบื้องหลังพวกเขา – นี่คือประวัติของ Yeezy";
                        
                    ?>
                    <br><br>
                    <img src="images/blog/yeezy1.jpg">
                    <br><br>
                    <?php
						echo "การร่วมมือครั้งแรกกับ adidas ของ Kanye เกิดขึ้นในปี 2549 เมื่อเขาออกแบบรองเท้าผ้าใบให้กับแบรนด์ 3-Stripes ซึ่งในที่สุดก็ไม่เคยได้เปิดตัว
						หลายปีที่ผ่านมา มันไม่ชัดเจนว่ารองเท้าผ้าใบรุ่น Yeezus จะมีหน้าตาเป็นอย่างไรจนกระทั่ง Ben Pruess (ผู้อำนวยการฝ่าย adidas Originals) 
						แชร์รูปภาพการออกแบบของ Kanye ผ่านอินสตาแกรม โพสต์ดังกล่าวแสดงให้เห็นถึงรองเท้าผ้าใบใหม่ของ Rod Laver Vintage ในสีขาวที่มีสัญลักษณ์ Dropout Bear บริเวณลิ้นรองเท้าของ Kanye
						ในปี 2013 7 ปีหลังจากทำงานกับ adidas ครั้งแรก Kanye ลงนามข้อตกลงมูลค่า 10 ล้านดอลลาร์เพื่อออกแบบรองเท้าผ้าใบภายใต้แบนเนอร์ของ adidas Originals 
						เค้าได้รับการควบคุมในเชิงสร้างสรรค์เพื่อที่จะได้ตระหนักถึงวิสัยทัศน์ทางศิลปะของเขาในโลกของรองเท้าผ้าใบ Kanye ดำเนินการต่อเพื่อสร้างช่วง Yeezy ที่ได้กลายเป็นสัญลักษณ์ทั่วโลก";
                    ?>
                    <br><br>
                    <img src="images/blog/yeezy2.jpg">
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