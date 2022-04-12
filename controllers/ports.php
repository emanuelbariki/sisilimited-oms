<?
    if($action == 'index'){
        $ports = $Ports->getAllActive();
        $tData['ports'] = $ports;
//        debug($brands);
		$data['content'] = loadTemplate('ports.tpl.php',$tData);
    }

    if($action == 'add'){
//        debug($_POST);
        $ports = $_POST['ports'];
        $Ports->insert($ports);
        redirect('ports', 'index');
		// $data['content'] = loadTemplate('ports.tpl.php',$tData);
    }