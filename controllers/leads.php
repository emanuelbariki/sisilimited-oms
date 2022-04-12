<?
    if($action == 'index'){
        
        if(!empty($_GET['id'])){
            $leadID = $_GET['id'];
            $leads = $Leads->allLeadsList($leadID);
            $tData['id']            = $leads['id'];
            $tData['clientname']    = $leads['clientname'];
            $tData['clientphone']   = $leads['clientphone'];
            $tData['clientemail']   = $leads['clientemail'];
            $tData['carid']         = $leads['carid'];
            $tData['link']          = $leads['link'];
            $tData['amount']        = $leads['amount'];
            $tData['image']         = $leads['image'];
            $tData['statusid']      = $leads['statusid'];
        }

        $statuslist = $LeadStatus->getAllActive();
        $tData['statuslist'] = $statuslist;

        $cars = $Cars->getAllCars();
        $tData['cars'] = $cars;
        $maxid = $Leads->maxID();
		$data['content'] = loadTemplate('leads-add.tpl.php',$tData);
    }

    if($action == 'leads-list'){
        $leads = $Leads->allLeadsList();
        $tData['allleads'] = $leads;

		$data['content'] = loadTemplate('leads-list.tpl.php',$tData);
    }
    
    if ($action == 'marklost') {
        $LeadDetails->update($_GET['id'], array('statusid' => 3));
        
        redirect('leads', 'leads-list');
    }

    
    if ($action == 'delete') {
        $Leads->delete($_GET['id']);
        
        redirect('leads', 'leads-list');
    }

    if($action == 'add'){
        // debug($_FILES);
        // debug($_POST);
        $leads = $_POST['lead'];
        $leads['createdby'] = $user['id'];
        $Leads->insert($leads);
        $lastID = $Leads->lastId();

        // $image = $_FILES['image'];

        if(empty($leads['id'])){

            $carids         = $_POST['carid'];
            $links          = $_POST['link'];
            $amounts        = $_POST['amount'];
            $statusids      = $_POST['statusid'];
            $imgs           = $_FILES['image'];

            foreach ($carids as $index => $carid) {
                $newArray['carid']  =    $carid;
                $newArray['leadid']  =    $lastID;
                $newArray['link']   =   $links[$index]; 
                $newArray['amount'] =   $amounts[$index];
                $newArray['statusid'] =   $statusids[$index];
                
                $image['name']      = $imgs['name'][$index];
                $image['type']      = $imgs['type'][$index];
                $image['tmp_name']  = $imgs['tmp_name'][$index];
                $image['error']     = $imgs['error'][$index];
                $image['size']      = $imgs['size'][$index];

                // debug($image);
                $img = resizeUploadImage($image, $refwidth = 1200, $refheight = 0, 'assets/images/products/', $format = 'jpg');
                    if(!empty($_FILES['image']['name'])){
                    $newArray['image'] = $img;
                }
                
                $LeadDetails->insert($newArray);
            }
            redirect('leads','index');

        }elseif(!empty($leads['id'])){
            $img = resizeUploadImage($image, $refwidth = 1200, $refheight = 0, 'assets/images/products/', $format = 'jpg');
            
            if(!empty($_FILES['image']['name'])){
              $leads['image'] = $img;
            }

            $Leads->update($leads['id'], $leads);
            redirect('leads','leads-list');
        }
    }



    if ($action == 'ajax_getleaddetails') {
        $leadID = $_GET['leadid'];
        $leads = $LeadDetails->leaddetailslist($leadID);
        // debug($leads);
    
        $response = array();
        $obj = null;
        $obj->details=$leads;
        $response[]=$obj;
        // debug($response);
        $data['content'] = $response;
      }
    
