<?php


session_start();

if (isset($_POST['login']) and isset($_POST['password'])) {

	$login    = $_POST['login'];
	$password = $_POST['password'];


	$config = parse_ini_file('config.ini');

	$connection = new mysqli( $config['localhost'],$config['username'],$config['password'],$config['dbname']);
	if ( $connection->connect_errno ) {
		//echo( 'ERROR ' . $connection->connect_error );
	} else {
		$_SESSION['login'] = $login;

		$result = $connection->query( "SELECT * FROM `users` WHERE login='$login' and password='$password'");
		if ( $result ) {
			while ( $users_data = $result->fetch_assoc() ) {
				$users = $users_data;
			}
			$count = mysqli_num_rows( $result );

			if ( $count == 1 ) {
				$_SESSION['login'] = $login;

				if ( isset( $_SESSION['login'] ) ) {
					$login = $_SESSION['login'];
					header('Location: /?user_id='. $users['id']);
					echo "Hello " . $login . "	";
					echo "";
				} else {
					echo 'Something goes wrong';
				}

			} else {

				$trouble = "Invalid Login User.";
				echo $trouble;
			}
		}
	}
}