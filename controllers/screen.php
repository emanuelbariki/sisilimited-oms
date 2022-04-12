<?php
	
if ($action == 'index' ) {
	$tData['name'] = $_GET['name'];
	
	// $tData['screenData'] = $Screens->getAll();
	$findData['status'] = 'active';
	
	$tData['screenData'] = $Screens->find($findData);
	
	
	$data['content'] = loadTemplate('screen_list.tpl.php',$tData);
}


if ($action == 'delete'){
	
	$id = $_GET['id'];
	
	$updateData['status'] = 'inactive';
	
	$Screens->update($id,$updateData);
	$_SESSION['message'] = 'Item inactivated';
	redirectBack();
}

if ($action == 'edit'){
	
	$id = $_GET['id'];
	$tData['screen']  = $Screens->get($id);
	
	
	$data['content'] = loadTemplate('screen_edit.tpl.php',$tData);
	
}

if ($action == 'save'){
	
	$id = $_POST['id'];
	
	$newData = $_POST['screen'];
	
	$Screens->update($id,$newData);
	
	$_SESSION['message'] = 'Updated';
redirect('screen','index');	
	
	
	
}