<?

if ( $action == 'index'){
	$messageContent = "Your car has arrived";
	$to	 = "255759840250";

	// sendSms($messageContent,$to);
	$data['content'] = loadTemplate('dashboard.tpl.php',$tData);
	
}

if ( $action == 'cs_index' ) {	
	
	$data['help'] ='The company settings are given on this screen.<br/>';
	
	$data['content'] = loadTemplate('home.tpl.php',$tData);
	
	
}

if ($action =='settings_save'){
	// debug($_POST);
	$miniData = $_POST['cs'];
	
	$uploaddir = 'images/';
	
	// Main Logo
	move_uploaded_file($_FILES["clogo"]["tmp_name"], $uploaddir . $_FILES["clogo"]["name"]);
	if (!empty ($_FILES["clogo"]["name"]) ) {
		$miniData['logo'] = $uploaddir.$_FILES["clogo"]["name"];
	}

	// White Logo
	move_uploaded_file($_FILES["c_w_logo"]["tmp_name"], $uploaddir . $_FILES["c_w_logo"]["name"]);
	if (!empty ($_FILES["c_w_logo"]["name"]) ) {
		$miniData['c_w_logo'] = $uploaddir.$_FILES["c_w_logo"]["name"];
	}

	// Dark Logo
	move_uploaded_file($_FILES["c_d_logo"]["tmp_name"], $uploaddir . $_FILES["c_d_logo"]["name"]);
	if (!empty ($_FILES["c_d_logo"]["name"]) ) {
		$miniData['c_d_logo'] = $uploaddir.$_FILES["c_d_logo"]["name"];
	}

	// debug($miniData);
	
	$Settings->update(1,$miniData);
	
	$_SESSION['message'] = 'Company Settings Changed';
	
	
	redirect ('home','cs_index');
}

if ($action=='ajax_hidehelp'){
	
	$upData['help'] = 0;
	$Users->update($_SESSION['member']['id'],$upData);
	
	$obj = null;
	$obj->msg ='done';
		
	$response[] = $obj;	
	$data['content'] = $response;
	
}

if ($action ==  'ajax_sendMsg'){
	
	$msg['msgto'] = $_GET['to'];
	$msg['message'] = $_GET['message'];
	$msg['msgfrom'] = $_SESSION['member']['id'];
	$Messages->insert($msg);
	
	$obj = null;
	$obj->msg ='done';
		
	$response[] = $obj;	
	$data['content'] = $response;
}


if ($action ==  'ajax_markRead'){
	
	$id = $_GET['id'];
	$Messages->delete($id);
	
	$obj = null;
	$obj->msg ='done';
		
	$response[] = $obj;	
	$data['content'] = $response;
}