<?
  class CallLogs extends model{
    var $table = 'calllogs';

      function getAllCalls($id="", $clientID="", $userID="", $callstatus=""){
      	$sql = "SELECT calllog_details.*, clients.name AS clientName, clients.phone AS clientPhone, users.name AS createdBy, callstatus.name AS statusName, date_format(calllogs.doc,'%d-%M-%Y') as call_date FROM `calllog_details`

			INNER JOIN calllogs ON
			calllog_details.calllogid = calllogs.id

			INNER JOIN clients ON
			clients.id = calllogs.clientid

			INNER JOIN users ON
			users.id = calllogs.createdby

			INNER JOIN callstatus ON
			calllog_details.callstatusid = callstatus.id

			WHERE 1=1";

			if (!empty($id)) {
				$sql .=" and calllogs.id = '$id'";
			}
			if (!empty($clientID)) {
				$sql .=" and clients.id = '$clientID'";
			}
			if (!empty($userID)) {
				$sql .=" and users.id = '$userID'";
			}
			if (!empty($callstatus)) {
				$sql .=" and callstatus.id = '$callstatus'";
			}
			
			// debug($sql);
		return fetchRows($sql);
      }
    }
