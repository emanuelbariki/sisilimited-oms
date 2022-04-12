<?
  class Leads extends model{
    var $table = 'leads';

    function allLeadsList($leadID=""){
      $sql = "SELECT leads.*, users.name AS createdBy FROM `leads`
          INNER JOIN users ON
          leads.createdby = users.id

          WHERE leads.status='active'";
          // debug($sql);
      if(!empty($leadID)){
        $sql .=" and leads.id = '$leadID'";

        return fetchRow($sql);
      }else{
          
        return fetchRows($sql);
      } 
    }


    function maxID(){
      $sql = "SELECT MAX(id) AS maxID FROM leads";
			return fetchRow($sql);
    }
  }
