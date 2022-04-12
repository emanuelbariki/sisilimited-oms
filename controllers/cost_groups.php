<?
    if($action == 'index'){
        $costgroups = $CostGroups->getAllActive();
        $tData['costgroups'] = $costgroups;
//        debug($brands);
		$data['content'] = loadTemplate('cost_groups.tpl.php',$tData);
    }

    if ($action == 'add') {
        $costgroups = $_POST['group'];

        $CostGroups->insert($costgroups);
        redirect('cost_groups', 'index');
    }