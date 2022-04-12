<?
  class OrderDetailsStatus extends model{
    var $table = 'order_details_status';

      function orderworkdone($orderid = "", $ticketid = "", $userid=""){
        $sql = "SELECT order_details_status.*, order_status.name AS statusName, brands.name AS brandName, makes.name AS makeName, cars.year AS carYear, users.name AS assignedTo, order_status.fileupload as hasFiles, orders.orderno as orderNo, order_status.payments as hasPayments FROM `order_details_status`

        INNER JOIN orders ON
        order_details_status.orderid = orders.id
        
        INNER JOIN cars ON
        orders.carid = cars.id
        
        INNER JOIN brands ON
        cars.brandid = brands.id
        
        INNER JOIN makes ON
        cars.makeid = makes.id
        
        INNER JOIN order_status ON
        order_details_status.order_statusid = order_status.id
        
        LEFT JOIN users ON
        order_details_status.assignedto = users.id
        
        WHERE 1=1";
        if (!empty($orderid)) {
          $sql .=" and orders.id='$orderid'";
        }
        if (!empty($ticketid)) {
          $sql .=" and order_details_status.id='$ticketid'";
        }
        if (!empty($userid)) {
          $sql .=" and order_details_status.assignedto='$userid'";
        }

        // if ($user['roleid'] != 1) {
        //   $sql .=" and order_details_status.assignedto='$user[id]'";
        // }
        // debug($sql);
        return fetchrows($sql);
      }
  }
