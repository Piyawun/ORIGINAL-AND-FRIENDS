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
	        		
                    <h2>Gucci ต้อนรับตรุษจีนปีหนูด้วยคอลเลกชั่น Mickey Mouse </h2>
                    <?php
                        echo "แฟชั่นเฮ้าส์สัญชาติอิตาลี Gucci เซอร์ไพรส์แฟนๆ ด้วยแคมเปญสนุกๆ รับเทศกาลตรุษจีนปีหนูที่ Alessandro Michele 
                        ครีเอทีฟไดเรคเตอร์คนสำคัญของ Gucci สร้างสรรค์คอลเลกชั่นพิเศษโดยมีตัวการ์ตูนเอกของ Walt Disney อย่าง Mickey Mouse เป็นตัวชูโรง 
                        เพื่อเป็นการเฉลิมฉลองปีหนู แคมเปญใหม่นี้ได้ช่างภาพและผู้กำกับชื่อดัง Harmony Korine มาเป็นช่างภาพให้ ร่วมด้วย Ni Ni นักแสดงสาวและ Gucci
                        ambassador, Earl Cave นักแสดงหนุ่มและดีไซเนอร์ และ Zoë Bleu สไตลิสต์และกวี มาร่วมแสดงในแคมเปญนี้ ภาพทุกภาพถ่ายทอดความสนุกสนาน
                        ขี้เล่นของคอลเล็คชั่นด้วยการตามรอยของมิกกี้เม้าส์ใน Disneyland";
                        
                    ?>
                    <br><br>
                    <img src="images/blog/Mickey1.jpg">
                    <br><br>
                    <?php
                        echo "ไฮไลต์ของคอลเลคชั่นนี้คือวัสดุใหม่ที่เป็นผ้าใบพิมพ์ลาย Mickey Mouse กับ Mini GG Supreme บนพื้นสีเบจและสีน้ำตาลดำ สำหรับ Mini GG วินเทจ 
                        Gucci พิมพ์ลาย Mickey Mouse ในท่าทางสนุกสนาน ซึ่งลายพิมพ์การ์ตูนนี้เคยถูกนำมาใช้กับผ้าของห้องเสื้อตั้งแต่ช่วงปี 80 ส่วนแพทเทิร์นต้นฉบับ สีสัน 
                        และหน้าตาได้ถูกนำมาทำใหม่ผ่านการใช้เทคโนโลยีการพิมพ์ดิจิตัลด้วยความละเอียดสูง พร้อมการเคลือบเพื่อป้องกันผิวและพิมพ์ลายนูนทำให้เกิดหน้าตาและพื้นผิวผ้าเหมือนผ้าลินิน
                        รวมถึงมีการติดป้ายหนังสีน้ำตาลไว้ด้านใน แสดงให้เห็นถึงความร่วมมือที่ Gucci มีอย่างเป็นทางการกับ Disney";
                    ?>
                    <br><br>
                    <img src="images/blog/Mickey2.jpg">
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