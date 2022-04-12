<?
  class OrderCosts extends model{
    var $table = 'order_costs';

      function orderCosts($orderid = null){
        $sql="SELECT order_costs.*, cost_groups.name AS CostGroupName, consignment_costs.name AS costName, cost_groups.id AS costGroupID, SUM(order_costs.amount) AS Totalamount FROM `order_costs`

        INNER JOIN consignment_costs ON
        order_costs.costid = consignment_costs.id
        
        INNER JOIN cost_groups ON
        consignment_costs.cost_groupid = cost_groups.id
        
        WHERE order_costs.orderid = '$orderid'
        GROUP BY order_costs.costid";

        return fetchRows($sql);
      }

      function ticketOrderCosts($orderid=""){
        $sql="SELECT order_costs.*, consignment_costs.name AS costName, cost_groups.name AS costGroup FROM `order_costs`

        INNER JOIN consignment_costs ON
        order_costs.costid = consignment_costs.id
        
        LEFT JOIN cost_groups ON
        consignment_costs.cost_groupid = cost_groups.id
        
        WHERE order_costs.orderid = '$orderid'";

        return fetchRows($sql);
      }
  }
