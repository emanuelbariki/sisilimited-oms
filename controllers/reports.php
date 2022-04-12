<?
	if ($action == 'payment') {

		$clientList = $Clients->getAllActive();
		$tData['clientList'] = $clientList;
		$paymentTypes = $PaymentMethods->getAllActive();
		$tData['paymentTypes'] = $paymentTypes;
		$tData['cartypes'] = $Cars->getAllCars();

		$orderno='';
		$paymentid="";
		$clientid="";
		$paymentmethod="";
		$carid="";
		$recievedby="";
		$from="";
		$to="";

		if ($_GET['search'] == 'true') {
			// debug($_POST);
			$orderno		= $_POST['search']['orderno'];
			$paymentid		= $_POST['search']['pid'];
			$clientid		= $_POST['search']['clientid'];
			$PaymentMethods = $_POST['search']['ptype'];
			$carid			= $_POST['search']['ctype'];
			$from			= $_POST['search']['fromdate'];
			$to				= $_POST['search']['todate'];
		}

		// Filter Reports here..
		$allpayments = $Payments->paymentReport($orderno,
										$paymentid,
										$clientid,
										$paymentmethod,
										$carid,
										$recievedby,
										$from,
										$to);

		$tData['allpayments'] = $allpayments;
		$data['content'] = loadTemplate('payment_reports.tpl.php',$tData);
	}

	if ($action == 'orders') {

        $alloders = $Orders->getAllOrders();
        $tData['allorders'] = $alloders;
        // debug($alloders);
        $data['content'] = loadTemplate('order_reports.tpl.php',$tData);
	}

	if ($action == 'order_profit') {

		$orderid = $_POST['orderid'];

		if (!empty($orderid)) {
			// $allpayments = $OrderCosts->find($arrayName = array('orderid' => $orderid ));
			$allpayments = $OrderCosts->orderCosts($orderid);
			$tData['allpayments'] = $allpayments;
		}

		// debug($tData);

        $data['content'] = loadTemplate('order_profit_reports.tpl.php',$tData);

	}

	if ($action == 'tasks') {
		if ($user['roleid'] == 1) {
			$userid = NULL;
		}else{
			$userid = $user['id'];
		}
        $workdone = $OrderDetailsStatus->orderworkdone($orderid, $ticketid, $userid);
        $tData['tickets'] = $workdone;

        $tData['users'] = $Users->getAllActive();

        // debug($workdone);
        $data['content'] = loadTemplate('tickets_reports.tpl.php',$tData);
	}

	if ($action == 'calls') {
		// debug($user);
		if ($user['roleid'] == 1) {
			$userID = NULL;
		}else{
			$userID = $user['id'];
		}

		$calls = $CallLogs->getAllCalls($id="", $clientID="", $userID, "");
		$tData['calls'] = $calls;
		// debug($calls);
        $data['content'] = loadTemplate('calllogs.tpl.php',$tData);
	}
?>
