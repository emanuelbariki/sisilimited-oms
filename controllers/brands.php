<?
    if($action == 'index'){
        $brands = $Brands->getAllActive();
        $tData['brands'] = $brands;
//        debug($brands);
		$data['content'] = loadTemplate('brands.tpl.php',$tData);
    }

    if($action == 'add'){
//        debug($_POST);
        $brands = $_POST['brand'];
        $Brands->insert($brands);
        redirect('brands', 'index');
		    // $data['content'] = loadTemplate('brands.tpl.php',$tData);
    }