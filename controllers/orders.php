<?
    if($action == 'index'){
        // orderid
        // debug($_GET);

        $clients= $Clients->clientsList();
        $tData['clientsList'] = $clients;

        $consignment_types = $ConsignmentTypes->getAllActive();
        $tData['consignment_types'] = $consignment_types;
        
        $cars = $Cars->getAllCars();
        $tData['cars'] = $cars;
        
        $ports = $Ports->getAllActive();
        $tData['ports'] = $ports;

        
        $orderstatus = $OrderStatus->getAllActive("sortno");
        $tData['orderstatus'] = $orderstatus;
        // debug($orderstatus);
        $consignmentcosts = $ConsignmentCosts->ConsignmentCostsList();
        $tData['consignmentcosts'] = $consignmentcosts;

        if (!empty($_GET['orderid'])) {
            $orderid = $_GET['orderid'];
            $alloders = $Orders->getAllOrders($orderid, $ordertype="", $clientID="", $eta="", $etd="", $userid="");
            $tData['orderdetails'] = $alloders[0];
            $ordercosts = $OrderCosts->orderCosts($orderid);
            $tData['ordercosts'] = $ordercosts;
            $tData['help'] = 0;
            $orderDetailsStatus = $OrderDetailsStatus->orderworkdone($orderid);
            $tData['orderDetailsStatus'] = $orderDetailsStatus;
        }

        // debug($tData);
        $data['content'] = loadTemplate('orders-add.tpl.php',$tData);

    }



    if ($action == 'list') {
        // debug($_SESSION['member']);
        if ($_SESSION['member']['clientdetails']) {
            $alloders = $Orders->getAllOrders($orderid="", $ordertype="", $_SESSION['member']['clientdetails']['id'], $eta="", $etd="", $userid="");
        }else{
            $alloders = $Orders->getAllOrders();
        }
        $tData['allorders'] = $alloders;
        // debug($alloders);
        $data['content'] = loadTemplate('orders-list.tpl.php',$tData);
    }

    if ($action == 'container-list') {
        $alloders =$Orders->getAllOrders_c();
        $tData['allorders'] = $alloders;
        // debug($alloders);
        $data['content'] = loadTemplate('container-orders-list.tpl.php', $tData);
    }

    
    if ($action == 'view') {
        $decoded = base64_decode($_GET['id']);
        $orderid = $decoded;
        // debug($orderid);
        $orderdetails = $Orders->getAllOrders($orderid);
        $tData['orderdetails'] = $orderdetails;

        $comments = $OrderComments->getOrderComments($orderid);
        
        // debug($comments);
        // foreach ($comments as $index => $comment) {
        //     if (empty($comment[$index]['postedBy'])) {
        //         $newArray['postedBy'] = "Customer";
        //         $newArray['image'] = "customer-imge.png";
        //         $newArray['date'] = $comments[$index]['date'];
        //         $newArray['comment'] = $comments[$index]['comment'];
        //         $newcomments[] =  $newArray;   
        //     }else {
        //         $newcomments[] = $comment[$index];
        //     }
        // }

        foreach ($comments as $id => $D) {
            $time = strtotime($D['date']);
            $date = get_time_ago($time);
            $D['date'] = $date;
            $comments[$id]['date'] = $date;
        }


        $tData['comments'] = $comments;
        // debug($comments );
        
        $workdone = $OrderDetailsStatus->orderworkdone($orderid);
        $tData['workdone'] = $workdone;
        $costgroups = $CostGroups->getAllActive();
        $ordercosts = $OrderCosts->orderCosts($orderid);
        foreach ($ordercosts as $key => $ordercost) {
            // $OrderCosts->find(array('orderid' => $orderid, 'orderid' => $orderid ));
            $allOrderCosts[$ordercost['costGroupID']]['id'] = $ordercost['id'];
            $allOrderCosts[$ordercost['costGroupID']]['orderid'] = $ordercost['orderid'];
            $allOrderCosts[$ordercost['costGroupID']]['costid'] = $ordercost['costid'];
            $allOrderCosts[$ordercost['costGroupID']]['paid'] = $ordercost['paid'];
            $allOrderCosts[$ordercost['costGroupID']]['paid_amount'] += $ordercost['paid_amount'];
            $allOrderCosts[$ordercost['costGroupID']]['paidby'] = $ordercost['paidby'];
            $allOrderCosts[$ordercost['costGroupID']]['paiddate'] = $ordercost['paiddate'];
            $allOrderCosts[$ordercost['costGroupID']]['CostGroupName'] = $ordercost['CostGroupName'];
            $allOrderCosts[$ordercost['costGroupID']]['costGroupID'] = $ordercost['costGroupID'];
            $allOrderCosts[$ordercost['costGroupID']]['totalamount'] += $ordercost['amount'];
            $allOrderCosts[$ordercost['costGroupID']]['amount_paid'] = $ordercost['paid_amount'];
        }
        $tData['ordercost'] = $allOrderCosts;

        $_SESSION['pagetitle'] = "COIP - Consignment Order In Progress";
        $pagetitle = "COIP - Consignment Order In Progress";
        // debug($tData);
        // $data['content'] = loadTemplate('order_view.tpl.php',$tData);
        $data['content'] = loadTemplate('order_view_1.tpl.php',$tData);
    }


    
    if ($action == 'add') {
       if (empty($_GET['leadid'])) {
            // debug($_POST);
            if (empty($_POST['order_id'])) {
                $orders = $_POST['order'];
                $status = $_POST['status'];
                $orders['statusid'] = 1;
                
                $maxid = $Orders->maxID();
                $orders['orderno'] = $maxid['maxID'] + 1;
                $orders['orderno'] = "SLO-". str_pad($orders['orderno'], 3, "0", STR_PAD_LEFT);
                $orders['createdby'] = $user['id'];
                // debug($orders);
                $Orders->insert($orders);
                $ordersLastId = $Orders->lastId();
                $costids = $_POST['costid'];
                $amounts = $_POST['amount'];

                foreach ($costids as $index => $costid) {
                    
                    $newArray['costid']         = $costid;
                    $newArray['orderid']        = $ordersLastId;
                    $newArray['amount']         = $amounts[$index];

                    $OrderCosts->insert($newArray);
                }
                
                foreach ($status as $index => $s_status) {
                    
                    $snewArray['order_statusid']         = $s_status;
                    $snewArray['orderid']                = $ordersLastId;
                    $snewArray['assignedto']             = 1;
                    // $newArray['amount']               = $amounts[$index];
                    
                    $OrderDetailsStatus->insert($snewArray);

                }
                redirect('orders', 'list');
            }else {
                $editedorder = $Orders->get($_POST['order']['order_id']);
                $orders = $_POST['order'];
                $status = $_POST['status'];

                $orders['orderno'] = $editedorder['orderno'];
                // debug($_POST);
                
                // debug($orders);
                $Orders->update($orders['order_id'], $orders);
                $ordersLastId = $orders['order_id'];
                $costids = $_POST['costid'];
                $amounts = $_POST['amount'];

                foreach ($costids as $index => $costid) {
                    
                    $newArray['costid']         = $costid;
                    $newArray['orderid']        = $ordersLastId;
                    $newArray['amount']         = $amounts[$index];

                    $OrderCosts->insert($newArray);
                }
                
                foreach ($status as $index => $s_status) {
                    
                    $snewArray['order_statusid']         = $s_status;
                    $snewArray['orderid']                = $ordersLastId;
                    $snewArray['assignedto']             = 1;
                    // $newArray['amount']               = $amounts[$index];
                    
                    $OrderDetailsStatus->insert($snewArray);

                }
                redirect('orders', 'list');
            }
            
       }elseif (!empty($_GET['leadid'])) {
            $leadid = $_GET['leadid'];
            $leads = $Leads->get($leadid);

            $clientname = $leads['clientname'];
            $clientexists = $Clients->find(array('name' => $clientname));

            if (!empty($clientexists)) {
                $clientid = $clientexists[0]['id'];
            }elseif (empty($clientexists)) {
                $Clients->insert(array('name' => $clientname,'status' => 'active' ));
                $clientid = $Clients->lastId();
            }
           
            $orders['statusid'] = 1;
            $maxid = $Orders->maxID();
            $orders['orderno'] = $maxid['maxID'] + 1;
            $orders['orderno'] = "SLO-". $orders['orderno'];
            $orders['createdby'] = $user['id'];
            $orders['clientid'] = $clientid;

            $leaddetails = $LeadDetails->get($_GET['detailsid']);
            $orders['carid'] = $leaddetails['carid'];
            $orders['image'] = $leaddetails['image'];
            $orders['statusid'] = "1";
            
            $LeadDetails->update($leaddetails['id'], array('statusid' => "4"));
            // debug($leaddetails['id']);

           $Orders->insert($orders);
           $ordersLastId = $Orders->lastId();

           $Leads->update($leaddetails['id'], array('statusid' => "4"));
           redirect('orders', 'index','orderid='.$ordersLastId);
       }
    }

    if ($action == 'add_comment') {
        $comments = $_POST['comment'];
        $OrderComments->insert($comments);
        redirect('orders','view', 'id='.$comments['orderid']);
    }

    if ($action == 'invoice') {
        $orderid = $_GET['id'];
        $orderData = $Orders->getAllOrders($orderid);
        $tData['orderData'] = $orderData;

        $clientDetails = $Clients->get($orderData[0]['clientid']);
        $tData['clientDetails'] = $clientDetails;

        $orderCosts = $OrderCosts->orderCosts($orderid);
        $tData['orderCosts'] = $orderCosts;
        // debug($orderCosts);
        $companyDetails = $Settings->get(1);
        $tData['companyDetails'] = $companyDetails;

        $paymentmethods = $PaymentMethods->getAllActive();
        $tData['paymentmethods'] = $paymentmethods;

        $GrandTotal = 0;
        foreach ($orderCosts as $key => $cost) {
            $GrandTotal = $GrandTotal + $cost['Totalamount'];
        }

        $orderpayments = $Payments->getPaymentDetails($paymentid="", $orderid);
        // debug($orderpayments);

        $TotalPaid = 0;
        foreach ($orderpayments as $key => $op) {
            $TotalPaid = $TotalPaid + $op['paid_totalmount'];
        }
        $tData['totalpaid'] = $TotalPaid;


        if ($TotalPaid > $GrandTotal) {
            $tData['pamentstatus'] = "Complete";
            $tData['badge'] = "badge-sisi";
        }else if($TotalPaid > 1){
            $tData['pamentstatus'] = "Partial";
            $tData['badge'] = "badge-pink";
        }else{
            $tData['pamentstatus'] = "Unpaid";
            $tData['badge'] = "badge-danger";
        }

        // echo "<pre>";
        // print_r(number_format($GrandTotal));
        // echo "<br>";
        // print_r(number_format($TotalPaid));
        // die();


        // debug($TotalPaid);
        // $num="35600000";
        // $totalinwords = numberTowords($num);
        // debug($totalinwords); 

        // debug($tData);
        $data['content'] = loadTemplate('tax-invoice.tpl.php',$tData);
    }


    if ($action == 'savepayment'){
        $payments = $_POST['payment'];
        $payments['doc'] = TODAY;

        if ($payments['cbankname'] != "") {
            $payments['bankname'] = $payments['cbankname'];
            unset($payments['cbankname']);
        }
        
        unset($payments['cbankname']);

        // debug($payments);
        $Payments->insert($payments);
        $paymentID = $Payments->lastId();
        // Payments
        // debug($paymentID);
        redirect('orders','acknowledgement_reciept&id='.$paymentID);
        $data['content'] = loadTemplate('acknowledgement_reciept.tpl.php',$tData);
    }


    if ($action == 'acknowledgement_reciept') {
        // debug($_GET);
        $paymentid = $_GET['id'];
        $paymentdetails = $Payments->getPaymentDetails($paymentid);
        $tData['paymentdetails'] = $paymentdetails;
        // debug($paymentdetails);
        $orderData = $Orders->getAllOrders($paymentdetails[0]['orderid']);
        $tData['orderData'] = $orderData;

        $clientDetails = $Clients->get($paymentdetails[0]['clientID']);
        $tData['clientDetails'] = $clientDetails;

        $orderCosts = $OrderCosts->orderCosts($paymentdetails[0]['orderid']);
        $tData['orderCosts'] = $orderCosts;

        $companyDetails = $Settings->get(1);
        $tData['companyDetails'] = $companyDetails;

        $allpayments = $Payments->getPaymentDetails("",$paymentdetails[0]['orderid']);
        $totalcost = 0;
        foreach ($orderCosts as $key => $cost) {
            $totalcost = $cost['amount'] + $totalcost;
        }
        $allpaid = 0;
        foreach ($allpayments as $key => $payments) {
            $allpaid = $payments['paid_totalmount'] + $allpaid;
        }

        if ($allpaid >= $totalcost) {
            $tData['pamentstatus'] = "Complete";
            $tData['badge'] = "badge-sisi";
        }else{
            $tData['pamentstatus'] = "Partial";
            $tData['badge'] = "badge-danger";
        }
        // debug($paymentdetails[0]['orderid']);

        $data['content'] = loadTemplate('acknowledgement_reciept.tpl.php',$tData);
    }