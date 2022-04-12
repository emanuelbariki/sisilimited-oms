<?
	include 'vars.php';
	
		
	//has query been run today
	$isRun = $ScriptLogs->find(array('date'=>TODAY));
		
	if (!$isRun){
		
		//mark as run before query runs to avoid duplicates in multi user situation
		
		$genData['date'] = TODAY;
		$ScriptLogs->insert($genData);
		
			
			
		}
	
?>