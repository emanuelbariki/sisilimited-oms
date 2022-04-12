<?
    if($action == 'index'){
        $cars = $Cars->getAllCars();
        $tData['cars'] = $cars;
        
        $brands = $Brands->getAllActive();
        $tData['brands'] = $brands;
        
        $makes = $Makes->getAllMakes();
        $tData['makes'] = $makes;

		$data['content'] = loadTemplate('cars.tpl.php',$tData);
    }

    if($action == 'add'){
        $cars = $_POST['car'];
        
        $exists = $Cars->find(array('brandid'=>$cars[brandid], 'makeid'=>$cars[makeid], 'year'=>$cars[year]));
        
        if(empty($exists)){
            $Cars->insert($cars);
            redirect('cars','index');
        }else{
            redirect('cars','index');
        }

		$data['content'] = loadTemplate('cars.tpl.php',$tData);
    }