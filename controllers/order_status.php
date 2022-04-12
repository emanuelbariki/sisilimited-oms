<?
    if($action == 'index'){
        $orderstatus = $OrderStatus->getAllActive("sortno");
        $tData['orderstatus'] = $orderstatus;
//        debug($brands);
		$data['content'] = loadTemplate('order_status.tpl.php',$tData);
    }

    if ($action == 'add') {
        $status = $_POST['status'];
        // debug($status);

        $OrderStatus->insert($status);
        redirect('order_status', 'index');
    }