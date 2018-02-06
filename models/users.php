<?php
/**
 * @param $login
 * @param $mail
 * @param $password
 */
function create_new_user( $login, $mail, $password){
	$connection = new mysqli('localhost','root','root','webusers');

	$password = password_hash($password, PASSWORD_DEFAULT);
	if($connection -> connect_errno){
		echo ('ERROR '.$connection->connect_error);
	} else {
		$query = 'INSERT INTO users (login,mail,password,created_at) 
			VALUES (\''.$login.'\', \''.$mail.'\',\''.$password.'\',NOW())';

		$result = $connection->query($query);
		if($result){
			$subject  = 'Confirmed registration from Web User Application';
			$message  = 'Hi, '.$login.', if you have received an email you had been successfully registered!';
			$headers  = 'From: web_user_application@gmail.com' . "\r\n" .
			            'Reply-To: web_user_application@gmail.com' . "\r\n" .
			            'MIME-Version: 1.0' . "\r\n" .
			            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			            'X-Mailer: PHP/' . phpversion();
			mail($mail, $subject, $message, $headers);
			header("location: /");

		} else {
			echo $connection->error;
		}
		$connection -> close();
	}
}

function get_user_by_id($id){

	$user_data = null;
	$connection = new mysqli('localhost','root','root','webusers');

	if($connection -> connect_errno){echo ('ERROR '.$connection->connect_error);} else {

		$query = "SELECT * FROM users WHERE id =".$id;
		$result = $connection->query($query);
		if($result){
			$user_data = $result -> fetch_assoc();
			$result -> free();
		}
		$connection -> close();
	}
	return $user_data;
}

