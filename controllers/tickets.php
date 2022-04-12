<?
    if ($action == 'list') {

        $orderid = $_GET['orderid'];
        if ($user['roleid'] == 1) {
            $userid = "";
        }else{
            $userid = $user['id'];
        }
        $workdone = $OrderDetailsStatus->orderworkdone($orderid, $ticketid = "", $userid);
        // debug($workdone);
        // $image = $Orders->get($orderid);
        // $workdone['image'] = $image['image'];
        $tData['workdone'] = $workdone;

        if (empty($_GET['ticketid'])) {
            $data['content'] = loadTemplate('tickets.tpl.php',$tData);
        }elseif (!empty(['ticketid'])) {
            
            // $workdone = $OrderDetailsStatus->get($_GET['ticketid']);
            $ticket = $OrderDetailsStatus->orderworkdone($orderid, $_GET['ticketid']);
            $tData['ticket'] = $ticket;
            $tData['ticketData'] = $OrderStatus->get($ticket[0]['order_statusid']);
            // debug($tData);

            $ordercosts = $OrderCosts->ticketOrderCosts($orderid);
            $tData['ordercosts'] = $ordercosts;
            // debug($ordercosts);
            $data['content'] = loadTemplate('tickets-single.tpl.php',$tData);
        }
    }

    if ($action == "assign") {

        $alloders = $Orders->getAllOrders();
        $tData['allorders'] = $alloders;
        $tData['users'] = $Users->find(array('status' => "active" ));
        # code...

        $data['content'] = loadTemplate('tickets-assign.tpl.php',$tData);
    }

    if ($action == 'ajax_updateasignedtask') {
        # code...
        
        // $orderID = $_GET['orderid'];
        // $workdone = $OrderDetailsStatus->orderworkdone($orderID);
        // debug($_GET);

        $userid = $_GET['userid'];
        $ticketid = $_GET['ticketid'];

        $OrderDetailsStatus->update($ticketid, array('assignedto' => $userid ));

        // debug($feedback);
        // if ($feedback == 1) {
        //     $msg = 'success';
        // }else{
        //     $msg = 'error';
        // }

        $response = array();
        $obj = null;
        $obj->message = "success";
        $response[]=$obj;
        // debug($response);
        $data['content'] = $response;
    }




    if ($action == 'add') {
        $ticket     = $_POST['ticket'];
        $id         = $_POST['id'];
        $orderid    = $_POST['order_costs']['orderid'];
        
        $ticket['file'] = uploadfile($_FILES);
        $ticket['date'] = TODAY;
        
        // debug($ticket);
        $OrderDetailsStatus->update($id, $ticket);

        
        

        if (!empty($_POST['order_costs'])) {
            $order_costs = $_POST['order_costs'];
            $tobepaid = $OrderCosts->find(array('id' => $order_costs['id'] ));

            if ($order_costs['paid_amount'] >= $tobepaid[0]['amount']) {
                $order_costs['paid'] = 1;
                $order_costs['paidby'] = $user['id'];
                $order_costs['paiddate'] = TODAY;
                $OrderCosts->update($order_costs['id'], $order_costs);
            }else {
                $order_costs['paid'] = 2;
                $order_costs['paidby'] = $user['id'];
                $order_costs['paiddate'] = TODAY;
                $OrderCosts->update($order_costs['id'], $order_costs);
            }
            
        }
        $orderstatus = $OrderDetailsStatus->get($id);
        $Orders->update($orderid, array('statusid' => $orderstatus['order_statusid'] ));
        redirect('tickets', 'list', 'orderid='.$orderid);        
    }



if ($action == 'ajax_getordertickets') {
    # code...
    $orderID = $_GET['orderid'];
    $workdone = $OrderDetailsStatus->orderworkdone($orderID);
    // debug($workdone);

    $response = array();
    $obj = null;
    $obj->details=$workdone;
    $response[]=$obj;
    // debug($response);
    $data['content'] = $response;
}
    
 