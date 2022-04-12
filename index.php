<?php
	/* Ya Aba Salehul Mahdi Adrikni */
	/* BUL BAL BUL */
	ob_start();
	session_start();
	include 'cfg/database.php';
	include 'functions.php';
	include 'db.php';

	ERROR_REPORTING(0);
	 // ERROR_REPORTING(E_ALL);


	date_default_timezone_set('Africa/Dar_es_Salaam');
	include 'lib/PHPMailer/PHPMailerAutoload.php';

	$controllers = 'controllers/';
	$models = 'models/';
	$default_module = 'home';
	$default_action = 'index';
	$layout = 'layout.tpl.php';
	$pagetitle = "OFFICE MANAGMENT SYSTEM";


	$module = $_GET['module'];
	$action = $_GET['action'];
	$action = str_replace ( '.html', '', $action );
	$format = $_GET['format'];

	$currentTime =  mktime(date("H"),   date("i"),   date("s"));
		$currentTime = date('H:i:s', $currentTime);
		$tomorrow = date("Y-m-d", strtotime('tomorrow'));
		define('NOW',$currentTime);
		define('TODAY', date('Y-m-d'));
		define('TOMORROW', $tomorrow);


	if ( empty($module) ) $module = $default_module;
	if ( empty($action) ) $action = $default_action;

	// validate login of user
	$member = $_SESSION['member'];
	if ( (empty($member)) and $module != 'authenticate' ) {
		if ($module == 'orders' and $action == 'view') {
			// $_SESSION['member']['id'] = 0; 
			// $_SESSION['member']['name'] = 'client'; 
			// $_SESSION['member']['username'] = 'Client'; 
			// $_SESSION['member']['image'] = 'default.jpg';
		}else{

			$module = 'authenticate';
			$action = 'login';
		}
	}

	/* Include all models */
	loadDir($models);
	//Instantiate the classes;
	include 'instantiate.php';

	$roleIds = $Roles->getAll();
		foreach ( $roleIds as $r ) {

			define(strtoupper('R_'.$r['name']),$r['id']);

		}


	$cs = $Settings->get(1);
	define(strtoupper('CS_COMPANY'),$cs['name']);
	define(strtoupper('CS_LOGO'),$cs['logo']);
	define(strtoupper('CS_WHITE_LOGO'),$cs['c_w_logo']);
	define(strtoupper('CS_DARK_LOGO'),$cs['c_d_logo']);
	define(strtoupper('CS_THEME'),$cs['themecolor']);
	define(strtoupper('CS_ADDRESS'),$cs['address']);
	define(strtoupper('CS_STREET'),$cs['street']);
	define(strtoupper('CS_TEL'),$cs['tel']);
	define(strtoupper('CS_FAX'),$cs['fax']);
	define(strtoupper('CS_MOBILE'),$cs['mobile']);
	define(strtoupper('CS_TIN'),$cs['tin']);
	define(strtoupper('CS_EMAIL'),$cs['email']);
	define(strtoupper('CS_ALERT'),$cs['alert']);
	define(strtoupper('CS_REDLIST'),$cs['redlist']);
	define(strtoupper('CS_EMAILPASS'),$cs['emailpass']);
	define(strtoupper('CS_EMAILHOST'),$cs['emailhost']);
	define(strtoupper('CS_EMAILPORT'),$cs['emailport']);
	define(strtoupper('CS_SMSUSER'),$cs['smsuser']);
	define(strtoupper('CS_SMSPASS'),$cs['smspass']);
	define(strtoupper('CS_SMSNAME'),$cs['smsname']);
	define(strtoupper('CS_AUTHENTICATE'),'true');
	define(strtoupper('CS_SMSSTAT'),$cs['smsstat']);
	define(strtoupper('CS_EMAILSTAT'),$cs['emailstat']);
	define(strtoupper('CS_STARTDATE'),$cs['startdate']);
	define(strtoupper('CS_CCODE'),'255');
	define(strtoupper('STARTYEAR'),'2017');
	define(strtoupper('ENDYEAR'),'2030');

	$pagetitle = $pagetitle . " | ".CS_COMPANY;

	
	// define('NOTIFICATION_COUNT','0');
	$_SESSION['notification_count'] = 0;



	// Get Prospective Notifications
	$fromdate   = TODAY;
    $todate     = TODAY;
    if ($member['roleid'] == 1) { 
        // $prospects 	= $Prospectives->getProspectives($id="", $userid ="", $clients="", $createdby="", $p_status = 2, $fromdate, $todate);
        // $follow_ups =  $FollowUps->getAllFollowups($id="", $clientID="", $userID="", "2");
    }else{
        $prospects 	= $Prospectives->getProspectives($id="", $member['id'], $clients="", $createdby="", $p_status = 2, $fromdate, $todate);
        $follow_ups =  $FollowUps->getAllFollowups($id="", $clientID="", $userID="", "2");
    }

	define('TODAY_PROSPECTS',$prospects);
	define('TODAY_PROSPECTS_COUNT',sizeof($prospects));
	//////////Prospectives///////////////

	define('TODAY_FOLLOWUP',$follow_ups);
	define('TODAY_FOLLOWUP_COUNT',sizeof($follow_ups));
	///////////Follow Ups///////////////




	$_SESSION['notification_count'] = $_SESSION['notification_count'] + sizeof($prospects) + sizeof($follow_ups);



	// define('NOTIFICATION_COUNT','0');
	$_SESSION['notification_count'] = 0;



	// Get Prospective Notifications
	$fromdate   = TODAY;
    $todate     = TODAY;
    if ($member['roleid'] == 1) {
        // $prospects 	= $Prospectives->getProspectives($id="", $userid ="", $clients="", $createdby="", $p_status = 2, $fromdate, $todate);
        // $follow_ups =  $FollowUps->getAllFollowups($id="", $clientID="", $userID="", "2");
        $arraivals = $Orders->getAllOrders($orderid="", $ordertype="", $clientID="", TODAY, $etd="", $userID="");
    }else{
        $prospects 	= $Prospectives->getProspectives($id="", $member['id'], $clients="", $createdby="", $p_status = 2, $fromdate, $todate);
        $follow_ups =  $FollowUps->getAllFollowups($id="", $clientID="", $member['id'], "2");
        $arraivals 	= $Orders->getAllOrders($orderid="", $ordertype="", $clientID="", TODAY, $etd="", $member['id']);
    }
    // debug($arraivals);

	define('TODAY_PROSPECTS',$prospects);
	define('TODAY_PROSPECTS_COUNT',sizeof($prospects));
	//////////Prospectives///////////////

	define('TODAY_FOLLOWUP',$follow_ups);
	define('TODAY_FOLLOWUP_COUNT',sizeof($follow_ups));
	///////////Follow Ups///////////////

	define('TODAY_ARRIVALS',$arraivals);
	define('TODAY_ARRIVALS_COUNT',sizeof($arraivals));
	///////////Follow Ups///////////////




	$_SESSION['notification_count'] = $_SESSION['notification_count'] + sizeof($prospects) + sizeof($follow_ups) + sizeof($arraivals);



	$user = $_SESSION['member'];
	if ($user) {
		// Define some global constants
		define('MEMBER_LOGGEDIN',true);
		define('USER_ID',$_SESSION['member']['id']);

	}
	else {
		define('USER_ID','');
	}

	if ( $format == 'json' ) $action = 'ajax_' . $action;

	$data['userProfile'] = $Users->get($_SESSION['member']['id']);

	if(empty($data['message'])) $data['message'] = $_SESSION['message'];
	if(empty($data['error'])) $data['error'] = $_SESSION['error'];

	if ( file_exists ( $controllers . $module . '.php' ) ) {
		include $controllers . $module . '.php';
	}

	$data['name']=$Users->get($_SESSION['member']['id']);
	$data['module'] = $module;
	$data['action'] = $action;


		//_______________________________________________
	if ($_SESSION['member']['roleid']==R_ADMIN) {
		$menus = $Menus->getAllMenus();

		foreach ($menus as $m) {
			$data['realmenus'][$m['mlabel']]['module'] = $m['mmod'];
			$data['realmenus'][$m['mlabel']]['action'] = $m['mact'];
			$data['realmenus'][$m['mlabel']]['icon'] = $m['micon'];
			$data['realmenus'][$m['mlabel']]['subs'][] = $m;
		}

	} else if ($_SESSION['member']) {
		$menus = $UserRights->getUserMenus($_SESSION['member']['id']);

		foreach ($menus as $m) {
			$data['realmenus'][$m['mlabel']]['module'] = $m['mmod'];
			$data['realmenus'][$m['mlabel']]['action'] = $m['mact'];
			$data['realmenus'][$m['mlabel']]['icon'] = $m['micon'];
			if ($m['slabel']) $data['realmenus'][$m['mlabel']]['subs'][] = $m;
		}

	}


	$userdetails = $Users->find(array('id' => $_SESSION['member']['id']));
	define('THEMECOLOR', $userdetails[0]['themecolor']);

	//get folder name
	if (strstr($_SERVER['PHP_SELF'], "/")) {
		$location = array();
		$location = explode("/", $_SERVER['PHP_SELF']);
		$folder = $location[count($location) - 2];
	}
	else {
		$folder = $_SERVER['PHP_SELF'];
	}

	//script, runs in background
	$host = 'localhost';
	$remote_house = 'http://localhost/'.$folder.'/controllers/background/';

	$socketcon = fsockopen($host, 80);
	if($socketcon) {
	   $socketdata = "GET $remote_house/script.php HTTP 1.1\r\nHost: $host\r\nConnection: Close\r\n\r\n";
	   fwrite($socketcon, $socketdata);
	   fclose($socketcon);
	}




	$data['staffs']=$Users->getAllActive();


	$data['menu'] = loadTemplate('menu.tpl.php', $data);
	$data['control_panel'] = loadTemplate('control_panel.tpl.php', $data);

	if ( empty($data['pagetitle']) ) 	$data['pagetitle'] = $pagetitle;
	if ( empty($data['layout']) ) 	$data['layout'] = $layout;

	if ( $format == 'none' ) {
		$data['layout'] = 'layout_iframe.tpl.php';

		global $templateData;
		$data['content'] .= '<script>window.print();</script>';
		$templateData['content'] = $data['content'];
	}



	if ( $format == 'json' ) echo json_encode($data['content']);
	else echo loadTemplate($data['layout'], $data);

	if ( $_SESSION['message'] ) $_SESSION['message'] = '';
	if ( $_SESSION['error'] ) $_SESSION['error'] = '';

	//AL HAMDU LILLAH;;
	ob_end_flush();

?>
