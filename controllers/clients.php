<?
	if ($action == 'index') {

        if (!empty($_GET['id'])) {
            $clientID = $_GET['id'];
            $clientsdetails = $Clients->get($clientID);
            
            // debug($clientsdetails);
            $tData['clientid']  = $clientsdetails['id'];
            $tData['name']      = $clientsdetails['name'];
            $tData['phone']     = $clientsdetails['phone'];
            $tData['address']   = $clientsdetails['address'];
            $tData['tin_no']    = $clientsdetails['tin_no'];
            $tData['website']   = $clientsdetails['website'];
            $tData['email']     = $clientsdetails['email'];
            $tData['status']    = $clientsdetails['status'];
            $tData['nida']      = $clientsdetails['nida'];
        }
            $clients= $Clients->clientsList();
            $tData['clientsList'] = $clients;
        
        // debug($tData);
		$data['content'] = loadTemplate('clients.tpl.php',$tData);
	}

	if ($action == 'add'){
		$clients = $_POST['client'];
        // debug($clients);
		$Clients->insert($clients);

		$_SESSION['message'] = 'Record Saved Successfuly';
		redirect('clients','index&alert="Success"');
    }
    
    if ($action == 'delete') {
        
		$clientID = $_GET['id'];
		$Clients->delete($clientID);

		$_SESSION['message'] = 'Record Saved Successfuly';
		redirect('clients','index&alert="Success"');
        # code...
    }


    if ($action == 'ajax_getclientdetails') {
		$cleintID = $_GET['id'];

		$clients = $Clients->singleclient($cleintID);

		$response = array();
		$obj = null;
		$obj->details=$clients;
		$response[]=$obj;
		$data['content'] = $response;
	}
