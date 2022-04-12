<?
    if($action == 'index'){
        $consignmentcosts = $ConsignmentCosts->ConsignmentCostsList();
        $tData['consignmentcosts'] = $consignmentcosts;
        
        $costgroups = $CostGroups->getAllActive();
        $tData['costgroups'] = $costgroups;
      //  debug($consignmentcosts);
		$data['content'] = loadTemplate('consignment_costs.tpl.php',$tData);
    }

    if($action == 'add'){
      $consignmentcosts = $_POST['consignmentcosts'];
      $consignmentcosts['createdby'] = $user['id'];
      // debug($consignmentcosts);
      $ConsignmentCosts->insert($consignmentcosts);
      redirect('consignment_costs', 'index');
		// $data['content'] = loadTemplate('consignment_costs.tpl.php',$tData);
    }