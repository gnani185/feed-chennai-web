<?php

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) && !empty($_POST['mobile']) ) {
	sendMail($_POST['name'],$_POST['email'],$_POST['mobile'],$_POST['subject'],$_POST['message']);
	
} else {
	echo 'Input parameters not set.';
	
}

function sendMail($name,$email,$mobile,$subject,$message){	
	$contents = "Hi, Mail Received from Feed Chennai Support, From Name: " . $name  . ", Email: " . $email . ", Mobile: " . $mobile . ", Subject: " . $subject . ", Message: " . $message;
	
	if($_POST['refer']){
		$friendname = $_POST['friendname'];
		$friendmobile = $_POST['friendmobile'];
		$contents = $contents . ", Friend Name: " . $friendname . ", Friend Mobile Number: " . $friendmobile;
	}
	
	$body = '
		<html>
			<head>
				<meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<title>Feed Chennai Team</title>
				<style>
					table, th, td {
					  border: 1px solid black;
					}
					td{
						padding: 10px 20px;
					}
				</style>
			</head>
			<body>
				<p>Hello Feed Chennai Team! </p>
				<p>You have received a mail from Feed Chennai Website Contact Form. Please find the details below. </p>
				<table>
					<tr>
						<td>Name</td><td>' . $name . '</td>
					</tr>
					<tr>
						<td>Email</td><td>' . $email . '</td>
					</tr>
					<tr>
						<td>Mobile</td><td>' . $mobile . '</td>
					</tr>
					<tr>
						<td>Subject</td><td>' . $subject . '</td>
					</tr>
					<tr>
						<td>Message</td><td>' . $message . '</td>
					</tr>';
					if($_POST['refer']){
						$friendname = $_POST['friendname'];
						$friendmobile = $_POST['friendmobile'];
						$body = $body . '<tr>
							<td>Friend Name</td><td>' . $friendname . '</td>
						</tr>
						<tr>
							<td>Friend Mobile</td><td>' . $friendmobile . '</td>
						</tr>
						';
					}
										
					$body = $body . '</table>
						</body>
					</html>
					';

	
	
	
	$to = "Feed Chennai Support<support@feedchennai.org.in>, Feed Chennai Good Act<feedchennaigoodact@gmail.com>";
	$subject = "Feed Chennai Contact";

	$header = 'MIME-Version: 1.0' ."\r\n";
	$header .= 'Content-type: text/html;charset=UTF-8' . "\r\n";
	$header .= "From:Feed Chennai Support<support@feedchennai.org.in> \r\n" . "X-Mailer: php";

	$retval = mail ($to,$subject,$body,$header);

	if( $retval == true ) {
		// Should send OK as this is validated in javascript file available under assets/vendor/php-email-form/validate.js file
		echo "OK";
	}else {
		echo "Message could not be sent...";
	}
}



?>