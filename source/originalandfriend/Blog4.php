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
	        		
                    <h2>แบรนด์ Louis Vuitton และ Christian Dior เปิดใช้แพลตฟอร์มบล็อคเชนเพื่อตรวจสอบสินค้า</h2>
                    <?php
						echo "ตามข่าวจากทาง ConsenSys นั้นได้จัดทีมร่วมกับ LVMH (บริษัทเจ้าของแบรนด์สุดหรูมากกว่า 70 แบรนด์รวมไปถึง Louis Vuitton และ 
						Christian Dior) และ Microsoft เพื่อสร้างแพลตฟอร์มบล็อคเชนที่สามารถให้บริการลูกค้าในการตรวจสอบสินค้าสุดหรูว่าเป็นของแท้ได้ 
						โดยแพลตฟอร์มดังกล่าวนั้นมีชื่อว่า AURA ซึ่งได้ถูกออกแบบมาเพื่อ 
						“ให้บริการในอุตสาหกรรมสุดหรูเต็มรูปแบบในการตรวจสอบและติดตามผลิตภัณฑ์สุดหรูที่มีประสิทธิภาพ”แบรนด์ของ LVMH ทั้งสองแบรนด์นั้นได้เข้าไปร่วมในโครงการนี้เป็นที่เรียบร้อยแล้ว
						อีกทั้งยังมีการหารือกันอยู่เพื่อขยาย AURA ไปสู่แบรนด์อื่นๆ ภายในกรุ๊ปของ LVMH ต่อไปอีกด้วย
						";
                        
                    ?>
                    <br><br>
                    <img src="images/blog/Louis1.jpg">
                    <br><br>
                    <?php
                        echo "“AURA ได้ทำให้ลูกค้าสามารถเข้าถึงประวัติของผลิตภัณฑ์ และพิสูจน์ได้ว่าสินค้านั้นเป็นของแท้ได้จากตั้งแต่วัตถุดิบที่ใช้จนถึงจุดที่ขายสินค้าไปจนถึงในตลาดมือสองได้”
						เทคโนโลยีบล็อคเชนนั้นจะทำให้เห็นถึงข้อมูลที่แตกต่างกันไปในทุกๆ ผลิตภัณฑ์ที่เก็บไว้ในสมุดบัญชี (ledger) ที่ปรากฎอย่างสาธารณะได้หมด ซึ่งลูกค้าสามารถที่จะใช้แอปทางการของแบรนด์ในการเข้าไปรับใบรับรอง certificate ที่จะให้ข้อมูลรายละเอียดเกี่ยวกับแหล่งที่มาและข้อมูลอื่นๆ ของผลิตภัณฑ์ได้ เช่น ข้อมูลในแง่จริยธรรม สิ่งแวดล้อม และคำแนะนำในการดูแลผลิตภัณฑ์พร้อมกับบริการรับประกัน เป็นต้น โดย AURA นั้นเป็นการพัฒนาโดยอิงจากบล็อคเชน Ethereum และใช้ Microsoft Azure ในการรันแพลตฟอร์ม
						ทีมที่อยู่เบื้องหลังของ AURA นั้นยังคาดหวังว่าแพลตฟอร์นี้จะถูกนำไปใช้กับแบรนด์สุดหรูอื่นๆ ได้ด้วยเช่นกัน ซึ่งจะทำให้พวกเขาสามารถให้บริการแบบตามสั่ง (tailor-made) หรือทำให้เกิดความ loyalty ต่อแบรนด์ได้มากขึ้นอีกด้วย
						";
                    ?>
                    <br><br>
                    <img src="images/blog/Louis2.jpg">
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