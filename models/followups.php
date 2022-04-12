<?
  class FollowUps extends model{
    var $table = 'followups';

      function getAllFollowups($id="", $clientID="", $userID="", $callstatus=""){
      	$sql = "SELECT calllog_details.*, clients.name AS clientName, clients.phone AS clientPhone, clients.id AS clientID, users.name AS createdBy, callstatus.name AS statusName, date_format(calllogs.doc,'%d-%M-%Y') as call_date, date_format(followups.followup_date, '%d-%M-%Y') as followupdate, followups.done as followupStatus FROM `calllog_details`
     
			INNER JOIN calllogs ON
			calllog_details.calllogid = calllogs.id
            
			INNER JOIN followups ON
			followups.calllogid = calllogs.id

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
				$sql .=" and followups.done = '$callstatus'";
			}
			$sql .=" GROUP BY followups.id";
			// debug($sql);
		return fetchRows($sql);
      }
    }
