<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';

	if(isset($_POST['reset'])){
		$email = $_POST['email'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			//generate code
			$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code=substr(str_shuffle($set), 0, 15);
			try{
				$stmt = $conn->prepare("UPDATE users SET reset_code=:code WHERE id=:id");
				$stmt->execute(['code'=>$code, 'id'=>$row['id']]);
				
				$message = "
					<h2>รีเซ็ตรหัสผ่าน</h2>
					<p>อีเมลล์: ".$email."</p>
					<p>โปรดคลิกลิงก์ด้านล่างเพื่อรีเซ็ตรหัสผ่านของคุณ.</p>
					<a href='http://localhost/Ecommerce%20Site%20PHP/ecommerce/password_reset.php?code=".$code."&user=".$row['id']."'>รีเซ็ตรหัสผ่าน</a>
				";

				//Load phpmailer
	    		require 'vendor/autoload.php';

	    		$mail = new PHPMailer(true);                             
			    try {
			        //Server settings
			        $mail->isSMTP();                                     
			        $mail->Host = 'smtp.gmail.com';                      
			        $mail->SMTPAuth = true;                               
			        $mail->Username = 'originalandfriend@gmail.com';     
			        $mail->Password = 'pe0969418899';                    
			        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                         
			        $mail->SMTPSecure = 'ssl';                           
			        $mail->Port = 465;                                   

			        $mail->setFrom('originalandfriend@gmail.com');
			        
			        //Recipients
			        $mail->addAddress($email);              
			        $mail->addReplyTo('originalandfriend@gmail.com');
			       
			        //Content
			        $mail->isHTML(true);                                  
			        $mail->Subject = 'Original&Friend reset password';
			        $mail->Body    = $message;

			        $mail->send();

			        $_SESSION['success'] = 'ส่งลิงก์รีเซ็ตรหัสผ่านเรียบร้อย';
			     
			    } 
			    catch (Exception $e) {
			        $_SESSION['error'] = 'ไม่สามารถส่งข้อความได้: '.$mail->ErrorInfo;
			    }
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}
		else{
			$_SESSION['error'] = 'ไม่พบอีเมล';
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'ป้อนอีเมลที่เชื่อมโยงกับบัญชี';
	}

	header('location: password_forgot.php');

?>



