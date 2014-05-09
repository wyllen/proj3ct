<?php

switch ($_REQUEST['action']) {
	case 'sidebar-clients':
		get_sidebar('clients');
		break;
	
	default:
		# code...
		break;
}