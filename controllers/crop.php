<?
	
	if ($action == 'index'){
		
		$tData['listData'] = $Crops->getAll();
		
		// echo '<pre>';
		// print_r($tData['listData']);
		// die();
		
		$data['content'] = loadTemplate('crop_list.tpl.php',$tData);
	}
	
	if ($action == 'crop_edit'){
		
		$tData['edit'] = true;
		
		$id = $_GET['id'];
		
		$tData['crop'] = $Crops->get($id);
		
		// echo '<pre>';
		// print_r($tData['crop']);
		// die();
		
		$action = 'crop_add';
	}
	
	if ($action == 'crop_add'){
		
		
		
		$data['content'] = loadTemplate('crop_edit.tpl.php',$tData);
	}
	
	
	if ($action == 'crop_save'){
		
		$id = $_POST['id'];
		$crop = $_POST['crop'];
		
		
		
		if ($id){
			//this is an edit
			
			$Crops->update($id,$crop);
			$_SESSION['message'] = 'Crop inserted';
			redirect('crop','index');
			
			
		}else{
			//this is new
			
			$Crops->insert($crop);
			$cropId = $Crops->lastId();
			$_SESSION['message'] = 'Crop inserted';
			redirect('crop','crop_edit&id='.$cropId);
			
		}
		
		
	}