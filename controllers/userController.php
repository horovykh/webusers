<?php

	if(isset($_REQUEST['register_new_user'])) {
		create_new_user($_REQUEST['login'], $_REQUEST['mail'], $_REQUEST['password']);
	}
