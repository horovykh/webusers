<?php

include 'config.php';
include 'controllers/loginController.php';
include 'models/changeUserData.php';
require 'vendor/autoload.php';

class Application {

	private $view_engine;

	public function setViewEngine($view_engine){
		$this->view_engine = $view_engine;
	}

	public function getViewEngine(){
		return $this->view_engine;
	}
}
	$loader = new Twig_Loader_Filesystem(__DIR__.DIRECTORY_SEPARATOR.'views');
	$twig = new Twig_Environment($loader);

	$my_website = new Application();
	$my_website -> setViewEngine($twig);


	if(isset($_GET['user_id']) and (@$_SESSION['login'])) {

		$user_id = $_GET['user_id'];
		$data = get_user_by_id( $user_id );

			if ( $_GET['user_id'] == $data['id'] and (@$_SESSION['login']) == $data['login'] ) {
				echo $my_website->getViewEngine()->render('profile.twig', array( 'user' => $data ) );

			} elseif(@$_SESSION['login'] != $data['login']) {
				header('Location: /controllers/logoutController.php');
			}

	} elseif (isset($_GET['mode'])) {
			$mode = $_GET['mode'];
			if($mode == 'register'){
				include 'controllers/userController.php';
				echo $my_website->getViewEngine()->render('register.twig', array());
			}
	} else  {
		echo $my_website->getViewEngine()->render('login.twig');
	}