<?php
	
if ($action == 'queue_index' ) {
	$tData['name'] = $_GET['name'];
	
	$tData['queue'] = $Queues->getAll();
	$data['content'] = loadTemplate('queue_list.tpl.php',$tData);
}

if ( $action == 'queue_edit') {
	$id = $_GET['id'];
	$tData['name'] = $_GET['name'];	
	$tData['edit'] = 1;
	
	$tData['queue'] = $Queues->get($id);
	$action = 'queue_add';
}

if ( $action == 'queue_add') {
	$data['content'] = loadTemplate('queue_edit.tpl.php',$tData);
}


if ( $action == 'queue_save') {
	
	$id = intval($_POST['id']);
	$queue = $_POST['queue'];
	
	if ( empty($id) )  {
		$queue['doc'] = 'now()';
		$queue['createdby'] = $_SESSION['member']['id'];;
		$Queues->Insert($queue);	
		$_SESSION['message'] = 'Queue Added';
		redirect('queue','queue_add');

		
	}
	else {
		$queue['modifiedby'] = $_SESSION['member']['id'];;
		$queue['dom'] = 'now()';
		$Queues->update($id,$queue);
		$_SESSION['message'] = 'Queue Updated';
		redirect('queue','queue_edit','id='.$id);
	
	}	
	
}

if ( $action == 'queue_delete') {
	$id = intval($_GET['id']);
	$Queues->delete($id);
	redirect('queue','queue_index');
}