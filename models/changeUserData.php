<?php
include 'users.php';

if (isset($_POST['newLogin']) and isset($_POST['newMail']) and isset($_POST['newPassword']) and isset($_GET['user_id'])){


	$newLogin    = $_POST['newLogin'];
	$newMail = $_POST['newMail'];
	$newPassword = $_POST['newPassword'];
	$user_id = $_GET['user_id'];
	$data = get_user_by_id( $user_id );
	$id = $data['id'];
		$connection = new mysqli( 'localhost', 'root', 'root', 'webusers' );

		if ( $connection->connect_errno ) {

			echo( 'ERROR ' . $connection->connect_error );

		} else {

			$result = $connection->query( "UPDATE `users` SET login = '$newLogin', mail = '$newMail', password = '$newPassword' WHERE id='$id'" );
			var_dump( $result );

			if ( $result ) {
				$connection->close();
			} else {
				echo 'error else';
			}
		}
	}
