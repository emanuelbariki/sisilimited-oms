<?
    if($action == 'list'){

        $fromdate   = TODAY;
        $todate     = TODAY;
        if ($user['roleid'] == 1) {
            $tData['prospectives'] = $Prospectives->getProspectives($id="", $userid ="", $clients="", $createdby="", $status="", $fromdate, $todate);
        }else{
            $tData['prospectives'] = $Prospectives->getProspectives($id="", $user['id'], $clients="", $createdby="", $status="", $fromdate, $todate);
        }
        // debug($tData);
        $data['content'] = loadTemplate('prospectives_list.tpl.php',$tData);
    }

    if($action == 'add'){
       // debug($_POST);
        // debug($user);
        $tData['clients'] = $Clients->getAllActive();
        $tData['users'] = $Users->getAllActive();
        $data['content'] = loadTemplate('assign_prospectives.tpl.php',$tData);
    }

    if ($action == 'save') {

        $clients = $_POST['clients'];

        // debug($_POST);
        $userid = $_POST['p']['userid'];
        $date   = $_POST['p']['date'];

        foreach ($clients as $key => $client) {
            $newArray['userid']     = $userid;
            $newArray['date']       = $date;
            $newArray['clientid']   = $client;
            $newArray['done']       = 2;
            $newArray['createdby']  = $_SESSION['member']['id'];

            $Prospectives->insert($newArray);
            // echo "<pre>";
            // print_r($newArray);
        }//die();

        // $data['content'] = loadTemplate('assign_prospectives.tpl.php',$tData);
        redirect('prospectives','add');

    }
