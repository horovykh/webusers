<?php
include 'users.php';

if (isset($_GET['user_id']) && isset($_POST['newLogin']) and isset($_POST['newMail']) and isset($_POST['newPassword'])) {


	$newLogin    = $_POST['newLogin'];
	$newMail     = $_POST['newMail'];
	$newPassword = $_POST['newPassword'];
	$user_id     = $_GET['user_id'];
	$data        = get_user_by_id( $user_id );
	$id          = $data['id'];

	function clean( $value = "" ) {
		$value = trim( $value );
		$value = stripslashes( $value );
		$value = strip_tags( $value );
		$value = htmlspecialchars( $value );

		return $value;
	}

	$newLogin    = clean( $newLogin );
	$newMail     = clean( $newMail );
	$newPassword = clean( $newPassword);

	if ( ! empty( $newLogin ) && ! empty( $newMail ) && ! empty( $newPassword ) ) {

		$config = parse_ini_file( 'config.ini' );

		$connection = new mysqli( $config['localhost'], $config['username'], $config['password'], $config['dbname'] );

		if ( $connection->connect_errno ) {

			echo( 'ERROR. Check input values');

		} else {

			$result = $connection->query( "UPDATE `users` SET login = '$newLogin', mail = '$newMail', password = '$newPassword' WHERE id='$id'" );

			if ( $result ) {
				$connection->close();
			} else {
				echo 'Check input values';
			}
		}
	}
}