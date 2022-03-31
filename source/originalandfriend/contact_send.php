<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$mesg = $_POST['message'];

$message = "\n".'จาก: '.$name."\n".'อีเมล์: '.$email."\n".'เรื่อง: '.$subject."\n".'ข้อความ:'.$mesg;

if($name<>"" || $email <> "" || $mesg <> "") {
	
	sendlinemesg();
	$res = notify_message($message);

}


function sendlinemesg() {
	
    define('LINE_API',"https://notify-api.line.me/api/notify");
	define('LINE_TOKEN','unPVW0JIS0zi4c36BetdQH6rZUb3eqGkaVnbUkUFF8k');

	function notify_message($message){

		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData,'','&');
		$headerOptions = array(
			'http'=>array(
				'method'=>'POST',
				'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
						."Authorization: Bearer ".LINE_TOKEN."\r\n"
						."Content-Length: ".strlen($queryData)."\r\n",
				'content' => $queryData
			)
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents(LINE_API,FALSE,$context);
		$res = json_decode($result);
		return $res;

	}

}


header('location: contact.php');
?>