<?php
	
	class LeadDetails extends model {
		var $table = 'lead_details';
		
		function leaddetailslist($leadID = ""){
			$sql = "SELECT lead_details.*, brands.name as brandName, makes.name AS makeName, cars.year AS year, lead_status.name AS leadStatus FROM `lead_details`
			INNER JOIN lead_status ON
			lead_details.statusid = lead_status.id
			INNER JOIN cars ON 
			lead_details.carid = cars.id
			INNER JOIN brands ON
			cars.brandid = brands.id
			INNER JOIN makes ON
			cars.makeid = makes.id
			
			WHERE leadid = $leadID";

			return fetchRows($sql);
		}
	}	