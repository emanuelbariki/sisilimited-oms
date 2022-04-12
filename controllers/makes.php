<?
    if($action == 'index'){
        $makes = $Makes->getAllMakes();
//        debug($makes);
        $tData['makes'] = $makes;
        
        
        $brands = $Brands->getAllActive();
        $tData['brands'] = $brands;
		$data['content'] = loadTemplate('makes.tpl.php',$tData);
    }

    if($action == 'add'){
    //    debug($_POST);
        $makes = $_POST['make'];
        $Makes->insert($makes);
        redirect('makes', 'index');
		// $data['content'] = loadTemplate('makes.tpl.php',$tData);
    }