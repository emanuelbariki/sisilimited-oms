<?
    if($action == 'index'){
        $consignment_types = $ConsignmentTypes->getAllActive();
        $tData['consignment_types'] = $consignment_types;
//        debug($brands);
		$data['content'] = loadTemplate('consignment_types.tpl.php',$tData);
    }

    if($action == 'add'){
//        debug($_POST);
        $consignment_types = $_POST['consignment_types'];
        $ConsignmentTypes->insert($consignment_types);
        redirect('consignment_types', 'index');
		    // $data['content'] = loadTemplate('brands.tpl.php',$tData);
    }