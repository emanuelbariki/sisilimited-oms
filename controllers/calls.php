<?
    if($action == 'index'){
        // debug($_GET);

        $pData = $Prospectives->getProspectives($id=$_GET['pid'], $userid ="", $clients="", $createdby="", $status="");
        $tData['prospectives'] = $pData;
        $client = $Clients->get($pData[0]['clientid']);
        $tData['callstatus'] = $CallStatus->getAllActive();

        $tData['previouscalls'] = $CallLogs->getAllCalls($id="", $client['id'], $userID="", $callstatus="");
        $tData['previousorders'] = $Orders->getAllOrders($orderid="", $ordertype="", $client['id']);
        $tData['clientData'] = $client;
        // debug($tData);
        $data['content'] = loadTemplate('single_call.tpl.php',$tData);
    }

    if ($action == 'savecall') {
    	// debug($_POST);
    	$callog = $_POST['calllog'];

		$pData = $Prospectives->getProspectives($callog['prospectiveid'], $userid ="", $clients="", $createdby="", $status="");
		$callog['clientid'] = $pData[0]['clientid'];

    	$callog['createdby'] = $_SESSION['member']['id'];
    	$CallLogs->insert($callog);
    	$lastID = $CallLogs->lastId();
    	// $lastID = 1;

    	$products 		= $_POST['product'];
    	$callstatusid 	= $_POST['callstatusid'];
    	$followupdate 	= $_POST['followupdate'];
    	$remarks 		= $_POST['remarks'];

    	foreach ($products as $key => $product) {
            $newArray['calllogid']      = $lastID;
            $newArray['product']        = $product;
            $newArray['callstatusid']   = $callstatusid[$key];
            $newArray['remarks']        = $remarks[$key];

            $CallLogDetails->insert($newArray);

            if ($callstatusid[$key] == 3) {
                $folloupArray['followup_date']  = $followupdate[$key];
                $folloupArray['calllogid']      = $lastID;
                $folloupArray['createdby']      = $_SESSION['member']['id'];
                $folloupArray['done']           = 2;

                $FollowUps->insert($folloupArray);
            }

            if ($callstatusid[$key] == 1) {
                $lastLead = $Leads->maxID();
                $lastLead = $lastLead['maxID'] +1;
                // debug($lastLead);
                if (!empty($_GET['cid'])) {
                    $clientdata = $CLients->get($_GET['cid']);
                    $clientname = $clientdata['name'];
                    $clientid   = $clientdata['id'];
                }else{
                    $pData = $Prospectives->getProspectives($callog['prospectiveid'], $userid ="", $clients="", $createdby="", $status="");
                    $clientname = $pData[0]['clientName'];
                    $clientid = $pData[0]['clientid'];
                }
                $clientData = $Clients->get($clientid);
                // debug($clientname);
                $leadArray['clientname']        = $clientname;
                $leadArray['clientphone']       = $clientData['phone'];
                $leadArray['clientemail']       = $clientData['email'];
                $leadArray['createdby']         = $_SESSION['member']['id'];
                $leadArray['leadno']            = "CL-". str_pad($lastID, 2, "0", STR_PAD_LEFT)."-".$lastLead;


                $Leads->insert($leadArray);
            }

        }

        if (!empty($_POST['followupid'])) {
            $FollowUps->update($_POST['followupid'], array('done' => 1 ));
        }

    	$Prospectives->update($callog['prospectiveid'], array('done' => 1 ));
    	redirect('prospectives', 'list', 'status=done');
    }

    if ($action == 'followups'){

        $followups = $FollowUps->getAllFollowups($id="", $clientID="", $userID="", "");

        $data['content'] = loadTemplate('calllogs.tpl.php',$tData);
    }
