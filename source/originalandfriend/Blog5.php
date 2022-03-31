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
	        		
                    <h2>ความเป็นมาของแบรนด์ Off-White กับไลฟ์สไตล์ที่แตกต่าง</h2>
                    <?php
                        echo "วัยรุ่นสาย Street ยุคนี้คงจะมีไม่กี่คนที่ไม่รู้จักแบรนด์ Off-White ใช่มั้ยล่ะครับ แน่นอนครับแบรนด์นี้เป็นแบรนด์ที่น่าสนใจและน่าค้นหามากๆ 
                        และหลายคนคงอยากจะจับจองเป็นเจ้าของอย่างแน่นอน วันนี้ Twenty9ine LAB จึงมีประวัติของแบรนด์มาฝากเพื่อเพิ่มความอยากให้ครับ อิอิ";
                        
                    ?>
                    <br><br>
                    <img src="images/blog/offwhite2.jpg">
                    <br><br>
                    <?php
                        echo "Off-White เกิดขึ้นจากผู้ชายมากความสามารถที่ชื่อว่า Virgil Abloh ผู้ชายคนหนึ่งที่เรียนจบตรีวิศวะ โทสถาปัตย์ และทำงานในด้าน Creative Director ในวงการบันเทิง เรียกได้ว่าครบเครื่องเรื่องความสามารถจริงๆ เลยล่ะครับ
 
                        Virgil Abloh เป็นคนคลั่งแฟชั่นที่แตกต่างจากคนอื่น เพราะเขาเลือกที่จะมองในสิ่งที่เป็นตรงกลางและไม่ชอบความสุดโต่งมากเกินไป เขาบอกว่าความเก่า ความใหม่ และความแพงต้องอยู่ร่วมกันได้ จึงเป็นที่มาของชื่อ Off-White ที่มาจากการเล่นคำของความหมายที่ว่า “ผืนผ้าใบที่ว่างเปล่า”
                        นอกจากนี้สินค้าต่างๆ ของ Off-White นี้ Virgil Abloh ยังบอกอีกว่ามาจากแรงบันดาลใจทางด้านงานสถาปัตย์ที่เขาหลงไหลและอยากให้สามารถอยู่ร่วมกับทุกคนได้แม้ไม่ใช่งานเกี่ยวกับสิ่งปลูกสร้างอีกด้วย (อาร์ตตัวพ่อจริงๆ เลยนะครับเนี่ย)
                         
                        และ Virgil Abloh ยังบอกอีกว่าแบรนด์ Off-White นี้ เป็นตัวตนภายในของเขาที่ตรงข้ามกับตัวตนภายนอกที่เขาแสดงออกมาตลอด เรียกได้ว่าเป็นประโยคที่เข้าใจง่ายแต่ดูเข้าถึงยากเหมือนกันนะครับ
                        สุดท้ายองค์รวมของแบรนด์ Off-White ที่ Virgil Abloh อยากจะนิยามให้คนทั่วไปเข้าใจนั่นก็คือ “ความสะอาด” และ “ความลงตัว” ที่เปลี่ยนไปตามยุคสมัยนั่นเอง หากอยากรู้ลึกรู้จริงกว่านี้ก็บอกเลยครับว่าต้องลองซื้อสินค้าของเขามาใช้ดูครับ แล้วคุณจะเข้าใจว่าสิ่งที่ Virgil Abloh ต้องการสื่อนั้นคืออะไรกันแน่!
                        ";
                    ?>
                    <br><br>
                    <img src="images/blog/offwhite1.jpg">
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