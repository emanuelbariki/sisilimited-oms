<?
  class Clients extends model{
    var $table = 'clients';

    // All Clients
        function clientsList($clientID=""){
            $sql = "SELECT clients.* FROM `clients`
            WHERE clients.status = 'active'";

            if (!empty($clientID)) {
              $sql .= " and clients.id = '$clientID' ";
            }
            // echo $sql;
            // die();
            return fetchRows($sql);
        }

        function singleclient($clientID){
            $sql = "SELECT clients.* FROM `clients`
            WHERE clients.id = '$clientID'";
            // echo $sql;
            // die();
            return fetchRows($sql);
        }
    }
