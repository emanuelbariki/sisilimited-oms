<?
  class Prospectives extends model{
    var $table = 'prospectives';

      function getProspectives($id="", $userid ="", $clients="", $createdby="", $status="", $fromdate="", $todate=""){
      	$sql = "SELECT prospectives.*, date_format(prospectives.date,'%d-%M-%Y') as issue_date, users.name AS assignedTo, clients.name AS clientName, usersC.name AS createdBy FROM `prospectives`

				INNER JOIN users ON
				prospectives.userid = users.id

				INNER JOIN clients ON
				prospectives.clientid = clients.id

				INNER JOIN users AS usersC ON
				prospectives.createdby = usersC.id

				WHERE 1=1";

			if (!empty($status)) {
				$sql .=" and prospectives.done = $status";
			}

			if (!empty($id)) {
				$sql .=" and prospectives.id = '$id'";
			}
			if (!empty($userid)) {
				$sql .=" and users.id = '$userid'";
			}
			if (!empty($clients)) {
				$sql .=" and clients.id = '$clients'";
			}
			if (!empty($createdby)) {
				$sql .=" and usersC.id = '$createdby'";
			}
			if (!empty($status)) {
				$sql .=" and prospectives.done = '$status'";
			}
		return fetchRows($sql);

      }
    }
