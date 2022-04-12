<?
  class ConsignmentCosts extends model{
    var $table = 'consignment_costs';

      function ConsignmentCostsList(){
          $sql = "SELECT consignment_costs.*, cost_groups.name AS costgroup FROM `consignment_costs`
          INNER JOIN cost_groups ON
          consignment_costs.cost_groupid = cost_groups.id  
          ORDER BY `consignment_costs`.`cost_groupid` ASC";

          return fetchRows($sql);
      }
    }
