<?php
	if ($_SESSION['member']['roleid'] == R_SUPER) {
		$isAdmin = 1;
	}
?>
<script>
	function verify(frm) {
		var theString = $('#patientname').val();
		
		noOfSpace = theString.split(/ /g).length - 1;
		if ( noOfSpace < <?=PATNAMES-1?> ) {
			
			alert("Please put <?=PATNAMES?> names of this customer");
			$('#patientname').focus();
			return false;
		}
		
		var tel = $("#telno").val();
		if (tel.length != 9){
			
			alert("Please put 9 numbers for telephone");
			$('#telno').focus();
			return false;
		}
		
		var signatureV = signature.toDataURL("image/png");
		var blank = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAEsCAYAAAAfPc2WAAAO5klEQVR4Xu3WMREAAAgDMerfNCZ+DAI65Bh+5wgQIECAAAECBFKBpWvGCBAgQIAAAQIETmB5AgIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAAYHlBwgQIECAAAECsYDAikHNESBAgAABAgQElh8gQIAAAQIECMQCAisGNUeAAAECBAgQEFh+gAABAgQIECAQCwisGNQcAQIECBAgQEBg+QECBAgQIECAQCwgsGJQcwQIECBAgAABgeUHCBAgQIAAAQKxgMCKQc0RIECAAAECBASWHyBAgAABAgQIxAICKwY1R4AAAQIECBAQWH6AAAECBAgQIBALCKwY1BwBAgQIECBAQGD5AQIECBAgQIBALCCwYlBzBAgQIECAAAGB5QcIECBAgAABArGAwIpBzREgQIAAAQIEBJYfIECAAAECBAjEAgIrBjVHgAABAgQIEBBYfoAAAQIECBAgEAsIrBjUHAECBAgQIEBAYPkBAgQIECBAgEAsILBiUHMECBAgQIAAgQeA2QEt69HvxwAAAABJRU5ErkJggg==';	
		
		if (signatureV != blank) $("#signatureText").val(signatureV);
		
		
		return true;	
	}
	
	function showSign(){
		
		$(".sign").toggle('slow');
	}
	
	$(function() {
		$('#signature').sketch({defaultColor: "#000",defaultSize: 2});
		$("#patientname").focus();
		
	});
	
	
	function addNewItemRow(btnObj) {
		objRow = document.getElementById("firstrow").cloneNode(true);
		
		selectTags = objRow.getElementsByTagName("SELECT");
		selectTags[0].selectedIndex = 0;
		
		inputTags = objRow.getElementsByTagName("INPUT");
		inputTags[0].value = '';
		inputTags[1].value = '';
		inputTags[2].style.display = 'block';
		document.getElementById("firstrow").parentNode.appendChild(objRow);
	}
	
	function removeItemRow(btnObj) {
		objRow = btnObj.parentNode.parentNode;
		// objRow.removeNode(true);
		objRow.remove();
	}
	
	
  	function insProviderTable() {	
    	if ($('#paytype').val() == 'Credit') {
    		// $('#insuranceDetails').show();
		}
    	else {
    		$('#insuranceDetails').hide();
			
			$(".ins").each(function(){
				// removeItemRow(this);
				tr = $(this).closest('tr');
				tr.find('#ins_com_id').val('');
				tr.find('#memberno').val('');
				tr.find('#membername').val('');
				tr.find('#memberposition').val('');
				tr.find('#creditlimit').val('');
			});
		}
	};
	
	function checkMembership(obj) {
		tr = $(obj).closest('tr');
		
		memberno = tr.find('#memberno').val();
		insprovid = tr.find('#ins_com_id').val();
		membername = tr.find('#membername').val();
		
		if (insprovid){
			
			$.get('?module=patients&format=json&action=getCreditLimit&insprovid='+insprovid,null,function(d){
				CC = eval(d);
				
				var climit = CC[0].climit; 
				var membernoReqd = CC[0].memberno; 
				tr.find('#creditlimit').val(climit);
				
				if (membernoReqd == 'yes'){
					tr.find('#memberno').addClass('required');
					
					if (memberno && insprovid) {
						$.get('?module=patients&format=json&action=checkMembership&memberno='+memberno+'&insprovid='+insprovid+'&membername='+membername+'&patid='+<?=$patient['id']+0?>,null,function(d){
							CC = eval(d);
							
							if (CC[0].status == 'yes') { //duplicate
								alert('Another patient is registered with these details. Member name '+CC[0].membername);
								tr.find('#memberno').val('').focus();
							}
						})
					}
				}
				else {
					//remove required from meberno
					tr.find('#memberno').removeClass('required');
					
					
				}
				
			})
		}
		
		checkEmptyFields(obj);
	}
	function redtoApp(){
		window.location.replace("?module=appointments&action=appointment_edit&id=<?=$patient['id']?>");
		
	}
	
	function checkEmptyFields(obj) {
		tr = $(obj).closest('tr');
		
		membername = tr.find('#membername').val();
		memberposition = tr.find('#memberposition').val();
		
		if (!membername) tr.find('#membername').css({'background-color':'pink'});
		else tr.find('#membername').css({'background-color':'white'});
		
		if (!memberposition) tr.find('#memberposition').css({'background-color':'pink'});
		else tr.find('#memberposition').css({'background-color':'white'});
	}
	
	$(insProviderTable);
	
	function toggleStaff() {
		$("#dependent").attr('checked',false);
	}
	function toggleDependent() {
		$("#staff").attr('checked',false);
	}
	
	function hideImg(){
		
		$("#sigDiv").hide();
		$("#canDiv").show();
		
	}
	
	// function ucwords (str) {
	// return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
	// return $1.toUpperCase();
	// });
	// }	
	
	function hideSave(){
		
		$("#saveDiv").hide();
	}
	
	function showSave(){
		
		$("#saveDiv").show();
	}
	
	$ (function (){
		
		$(".box").keydown(function() {
			showSave();
		});
		$(".box").change(function() {
			showSave();
		});
		
		$("#ccode").select2({    dropdownAutoWidth : true});
	});
	
	
	function addTIN(){
		if ($("#ctype").val() == 'Wholesale') $("#tin").addClass("required");
		else  $("#tin").removeClass("required");
	}
	
	function patientExist(){
		
		id = $("#patid").val();
		name = $("#patientname").val();
		telno = $("#telno").val();
		
		
		if (name && telno && id == ''){
			
				$.get('?module=patients&format=json&action=patientExist&name='+name+'&telno='+telno,null,function(d){
					CC = eval(d);
					
					var found = CC[0].found; 
					if (found == 'yes') {
					
						
						var reply = confirm('This patient may already exist. Found a patient called ' + CC[0].name + ' with HMS No ' + CC[0].patid + ' Edit that patient?');
						if (reply == true) {
							window.location.replace("?module=patients&action=patient_edit&id=" + CC[0].patid);

						}
					}
				});
		}
	}
	
</script>
<div class="content" style="padding:5px;width:730;">
	
	<form method="post" action="<?=url('patients','patient_save')?>" enctype="multipart/form-data" onsubmit="hideSave()">
		<input type="hidden" name="id" value="<?=$patient['id']?>">
		
		<table class="crm_table" width="100%">
			<col width="80">
			<tr><td colspan=4>Patient</td></tr>
			<tr>
				<th width="100px">Name*</th>
				<td colspan=1>
					<input type="hidden" name="id" id="patid" value="<?=$patient['id']?>">
					<input type="text" class="requited box name properCase" style="width:100%" name="patient[name]" id="patientname" onblur="patientExist()" value="<?=$patient['name']?>">
				</td>
				<th>Area</th>
				<td>
						<input type="text" class="box" style="width:100%" name="patient[area]" value="<?=$patient['area']?>">
				</td>
			</tr>
			<tr>
				<th>Street</th>
				<td>
						<input type="text" class="box" style="width:100%" name="patient[street]" value="<?=$patient['street']?>">
				</td>
				
				<th>Plot No</th>
				<td>
						<input type="text" class="box" style="width:100%" name="patient[plotno]" value="<?=$patient['plotno']?>">
				</td>
				
			</tr>	
			<tr>
				<th>Post Code</th>
				<td>
						<input type="text" class="box" style="width:100%" name="patient[postcode]" value="<?=$patient['postcode']?>">
				</td>
				
				<th>Building Name</th>
				<td>
						<input type="text" class="box" style="width:100%" name="patient[building]" value="<?=$patient['building']?>">
				</td>
				
			</tr>	
			
			<tr>
				<th>Floor / Flat No</th>
				<td>
						<input type="text" class="box" style="width:100%" name="patient[flat]" value="<?=$patient['flat']?>">
				</td>
				
				<th>Telephone No.*</th>
				<td>
					<select id="ccode" name="patient[ccode]" style="width:30%">
						<option value="255">(+255) Tanzania
							<?foreach ($country as $c){?>
								<option value="<?=$c['ccode']?>"<?if ($c['ccode'] == $patient['ccode']) echo 'selected';?>>
									(+<?=$c['ccode']?>) <?=$c['country']?> 
								</option>
							<?}?>
					</select>	
					<input type="text" class="required box validate-number" title="Enter telephone no" onblur="patientExist()" style="width:65%" id="telno" name="patient[telno]" value="<?=$patient['telno']?>">
				</td>
				
			</tr>	

			<tr>
				<th>Telephone No 2.</th>
				<td>
					<select id="ccode" name="patient[ccode]" style="width:30%">
						<option value="255">(+255) Tanzania
							<?foreach ($country as $c){?>
								<option value="<?=$c['ccode']?>"<?if ($c['ccode'] == $patient['ccode']) echo 'selected';?>>
									(+<?=$c['ccode']?>) <?=$c['country']?> 
								</option>
							<?}?>
					</select>	
					<input type="text" class="required box validate-number" title="Enter telephone no" onblur="patientExist()" style="width:65%" id="telno" name="patient[telno2]" value="<?=$patient['telno2']?>">
				</td>
				
				<th>Telephone No 3.</th>
				<td>
					<select id="ccode" name="patient[ccode]" style="width:30%">
						<option value="255">(+255) Tanzania
							<?foreach ($country as $c){?>
								<option value="<?=$c['ccode']?>"<?if ($c['ccode'] == $patient['ccode']) echo 'selected';?>>
									(+<?=$c['ccode']?>) <?=$c['country']?> 
								</option>
							<?}?>
					</select>	
					<input type="text" class="required box validate-number" title="Enter telephone no" onblur="patientExist()" style="width:65%" id="telno" name="patient[telno3]" value="<?=$patient['telno3']?>">
				</td>
				
			</tr>	
			
			
			
				<tr>
					<!--<th>Race</th><td><input type="text" class="box" style="width:100%" name="patient[race]" value="<?=$patient['race']?>"></td>-->
					<th>Email.</th>
					<td>
						<input type="text" class="box validate-email " style="width:100%" name="patient[email]" value="<?=$patient['email']?>">
					</td>
					<!--<th>Marital Status</th><td>
						<select id="maritalstatus" name="patient[maritalstatus]" class="" title="Marital status is required">
							<option value="">Select</option>
							<option value="married" <?=selected($patient['maritalstatus'],'married')?>>Married</option>
							<option value="single" <?=selected($patient['maritalstatus'],'single')?>>Single</option>
						</select>
					</td>
				</tr>
				
				<tr>
				<th width="100px">Date of Birth</th><td width="200px"><input type="text" class="datepicker box" style="width:100%" title="Enter date of birth" name="patient[dob]" value="<?=formatD($patient['dob'])?>"></td>
				<th>Gender</th><td>
					<select id="gender" name="patient[gender]" class="box" title="Select Gender">
						<option value="">Select</option>
						<option value="male" <?=selected($patient['gender'],'male')?>>Male</option>
						<option value="female" <?=selected($patient['gender'],'female')?>>Female</option>
					</select>
				</td>
			</tr>	
				
					<tr>-->
						<th>Cylinder Type</th>
						<td>
							<select name="patient[cylinderid]" style="width:100%">
								<option></option>
								<?foreach ($fullCylinders as $l){?>
									<option value="<?=$l['id']?>"<?if ($l['id'] == $patient['cylinderid']) echo 'selected';?>>
										<?=$l['tradename']?> 
									</option>
								<?}?>
							</select>
								</td>
						</tr>
						<tr class="modeOnlyPharmacy">
							<th>Kin relation: name</th><td><input type="text" class="box properCase" style="width:100%" name="patient[kinname]" value="<?=$patient['kinname']?>"></td>
							<th>Kin: relation</th><td><input type="text" class="box properCase" style="width:100%" name="patient[kinrelation]" value="<?=$patient['kinrelation']?>"></td>
						</tr>
						<tr class="modeOnlyPharmacy">
							<th>Kin relation: contact</th><td><input type="text" class="box" style="width:100%" name="patient[kincontact]" value="<?=$patient['kincontact']?>"></td>
							<th>Status</th>
							<td>
								
								<select name="patient[status]" class="box">
									<option value="active" <?=selected($patient['status'],'active')?>>Active</option>
									<option value="inactive" <?=selected($patient['status'],'inactive')?>>In-Active</option>
								</select>
							</td>
						</tr>
						<tr class="modeOnlyPharmacy">
							<th>Payment Type</th>
							<td>
								<?php 
									// if ( $_SESSION['maskUser'] || !$patient['id']) $status = '';
									// else $status = 'disabled';
								?>
								<select name="patient[paytype]" id="paytype" class="box" onchange="insProviderTable()">
									<option value="Cash" <?=selected($patient['paytype'],'Cash')?>>Cash</option>
									<option value="Credit" <?=selected($patient['paytype'],'Credit')?>>Credit</option>
								</select>
							</td>
							<th class="modeOnlyPharmacy">Staff</th>
							<td class="modeOnlyPharmacy"><input type="checkbox" onclick="toggleStaff()" class="box" id="staff" name="patient[staff]" value=1 <?=selected($patient['staff'],1,"checked");?>></td>
						</tr>
						<tr>
							<th>Customer Type</th>
							<td>
								<select name="patient[type]" id="ctype" class="box" style="width:100%" onchange="addTIN()">
									<option value="Retail" <?=selected($patient['type'],'Retail')?>>Retail</option>
									<option value="Wholesale" <?=selected($patient['type'],'Wholesale')?>>Wholesale</option>
									<option value="Dealer" <?=selected($patient['type'],'Dealer')?>>Dealer</option>
									<option value="Restaurant" <?=selected($patient['type'],'Restaurant')?>>Restaurant</option>
								</select>
							</td>
							<th>TIN</th>
							<td>
								<input type="text" id="tin" class="box" name="patient[tin]" value="<?=$patient['tin']?>">
							</td>
						</tr>
						<tr>
							<th>Language</th>
						<td>
							<select name="patient[languageid]" style="width:100%">
								<?foreach ($langs as $l){?>
									<option value="<?=$l['id']?>"<?if ($l['id'] == $patient['languageid']) echo 'selected';?>>
										<?=$l['name']?> 
									</option>
								<?}?>
							</select>
								</td>
							<th class="modeOnlyPharmacy">Staff Dependent: </th>
							<td colspan="" class="modeOnlyPharmacy"><input type="checkbox" onclick="toggleDependent()" id="dependent" class="box" name="patient[dependent]" value=1 <?=selected($patient['dependent'],1,"checked");?>></td>
							<th>Remarks: </th><td colspan=""><textarea class="box properCase" name="patient[remark]" value="<?=$patient['remark']?>"><?=$patient['remark']?></textarea></td>
						</tr>
						
						<tr style="display:none">
							<th>Picture</th>
							<td>
								
								<div id="container">
									<video autoplay id="videoElement" style="width:200px">
										
									</video>
								</div>
								
								
								<canvas id="canvas" width="800px" height="600px" style="display:none" ></canvas>
								
								
								
								<img id="imgtag" src="" width="200" style="display:none" />
								
								<br/>
								
								<input type="button" value="Capture" id="save" />
								<input type="button" value="Refresh" id="release" style="display:none" />
								<input type="hidden" id="webcamImg" name="webcamText" />
								
							</td>
							<td colspan=2><a href="#;return false();" onclick="showSign()">Signature</a></td>
						</tr>
						<tr style="display:none">
							<th class="sign" style="display:none">Signature</th>
							<td class="sign" style="display:none" colspan=3>
								<div class="tools">
									<a href="#signature" data-color="#000" data-tool="marker">Pen</a>
									
									<a href="#signature" data-tool="eraser" onclick="hideImg()">Erase</a>
								</div>
								<?if ($patient['signature']){
									$visCan = "style='display:none'";
									} else {
									$visImg = "style='display:none'";
								}?>
								
								<div id="sigDiv" <?=$visImg?>>
									<img width="600px" height="300px" style="border:1px solid black" src="<?=$patient['signature']?>"/>
								</div>
								
								<div id="canDiv" <?=$visCan?>>
									<canvas id="signature" width="600px" height="300px" style="border:1px solid black"></canvas>
								</div>
								
								<input type="hidden" name="signatureText" id="signatureText" />
								
							</td>
						</tr>
					</table>
					
					<br><br>
					
					<div id="insuranceDetails" style="display:none">
						<table class="crm_table" width="100%">
							<col width="300">
							<tr><th colspan="7" >Credit Details</th>
							</tr>
							<tr>
								<th style="width:200">Provider / Company*</th><th>Member Name*</th><th>Member Position</th><th>Membership No</th><th>Vote No</th><th>Credit Limit</th>
								<th><input type="button" value="Add" style="width:100%" onClick="addNewItemRow(this);"></th>
							</tr>
							<?php
								for ($id=0; $id<=count($patientInsurances);$id++) {
									$s = $patientInsurances[$id];
									
									$class=''; $display = '';
									
									if($id==0) { $class='id="firstrow"'; $display='style="display:none;"'; }
								?>
								
								<tr id="firstrow" class="ins">
									<td>
										<select name="ins_com_id[]" id="ins_com_id" class="validate-not-first box" title="Select insurance provider" onchange="checkMembership(this)" style="width:100%" >
											<?php
												if(count($insProviders)) {
													
													echo'<option></option>';
													
													foreach($insProviders as $insProvider) {
														
															echo'<option value="'.$insProvider['id'].'" '.selected($insProvider['id'],$s['ins_com_id']).'>'.$insProvider['name'].'</option>';
														}
												}
											?>
										</select>
									</td>
									<td>
										<input type="hidden" name="billcode[]" value="<?=$s['billcode']?>">
										<input type="text" name="membername[]" title="Enter member/cardholder name" class="box required properCase" onblur="checkEmptyFields(this)" id="membername" value="<?=$s['membername']?>">
									</td>
									<td>
										
										<select name="memberposition[]" id="memberposition" class="validate-not-first" title="Select member position" onchange="checkEmptyFields(this)">
											<option></option>
											<option value="Self" <?=selected($s['memberposition'],'Self')?>>Self</option>
											<option value="Parents" <?=selected($s['memberposition'],'Parents')?>>Parents</option>
											<option value="Child" <?=selected($s['memberposition'],'Child')?>>Child</option>
											<option value="Spouse" <?=selected($s['memberposition'],'Spouse')?>>Spouse</option>
										</select>
									</td>
									<td>
										<input type="text" name="memberno[]" class="box required" title="Enter membership number" onchange="checkMembership(this)" onblur="checkMembership(this)" onmouseover="checkMembership(this)" id="memberno" value="<?=$s['memberno']?>">
									</td>
									<td>
										<input type="text" name="voteno[]" class="box" title="Enter vote number" id="voteno" value="<?=$s['voteno']?>">
									</td>
									<td>
										<input type="text" id="creditlimit" class="box required" <?if ($_SESSION['member']['roleid'] != R_SUPER) echo 'readonly';?> title="Enter credit limit" name="creditlimit[]" value="<?=$s['creditlimit']?>">
									</td>
									<td align="center"><input type="button" value="Remove" <?=$display?> class="box" onclick="removeItemRow(this);"></td>
								</tr>
							<?}?>
						</table><br>
					</div>
					
					<table class="crm_table" width="100%">
						<!--<tr>
							<th width="30%">Upload OPD Card</th>
							<td>
							<input type="file" name="reportpath" class="box" size="25">
							</td>
						</tr-->
					</table><br>
					<table class="crm_table" width="100%" style="display:none">
						<tr>
							<th width="30%" class="changeAble">Upload Patient Picture</th>
							<td>
								<input type="file" name="patientpic" class="box" size="25">
							</td>
						</tr>
						<?if ($patient['photo']){?>
							<tr>
								<th>Picture</th>
								<td colspan=3><img src="<?=$patient['photo']?>" width="50px"/></td>
							</tr>
						<?}?>
					</table><br>
					<div id="saveDiv"><input type="submit" value="Save" onclick="return verify(this)"> <input type="button" value="Close" onclick="self.parent.location.reload();self.parent.tb_remove();">
					</div>
					<?if ($edit){if ($patient['status']=='active'){?>
						<button onclick="redtoApp();return false;">Appointment</button>
					<?}}?>
				</form>
				
				
				<!-- Webcam JS -->
				<script>
					var video = document.querySelector("#videoElement");
					
					// check for getUserMedia support
					navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
					
					if (navigator.getUserMedia) {       
						// get webcam feed if available
						navigator.getUserMedia({video: true}, handleVideo, videoError);
					}
					
					function handleVideo(stream) {
						// if found attach feed to video element
						video.src = window.URL.createObjectURL(stream);
					}
					
					function videoError(e) {
						// no webcam found - do something
					}
					var v,canvas,context,w,h;
					var imgtag = document.getElementById('imgtag'); // get reference to img tag
					var sel = document.getElementById('fileselect'); // get reference to file select input element
					
					document.addEventListener('DOMContentLoaded', function(){
						// when DOM loaded, get canvas 2D context and store width and height of element
						v = document.getElementById('videoElement');
						canvas = document.getElementById('canvas');
						context = canvas.getContext('2d');
						w = canvas.width;
						h = canvas.height;
						
					},false);
					
					function draw(v,c,w,h) {
						
						if(v.paused || v.ended) return false; // if no video, exit here
						
						context.drawImage(v,0,0,w,h); // draw video feed to canvas
						
						var uri = canvas.toDataURL("image/png"); // convert canvas to data URI
						
						// console.log(uri); // uncomment line to log URI for testing
						$("#webcamImg").val(uri);
						imgtag.src = uri; // add URI to IMG tag src
					}
					
					document.getElementById('save').addEventListener('click',function(e){
						
						$("#imgtag").show();
						$("#videoElement").hide();
						$("#release").show();
						$("#save").hide();
						draw(v,context,w,h); // when save button is clicked, draw video feed to canvas
						
						
					});
					
					document.getElementById('release').addEventListener('click',function(e){
						
						$("#imgtag").hide();
						$("#videoElement").show();
						$("#release").hide();
						$("#save").show();
						
						
						
					});
					
					// for iOS 
					
					// create file reader
					var fr;
					
					sel.addEventListener('change',function(e){
						var f = sel.files[0]; // get selected file (camera capture)
						
						fr = new FileReader();
						fr.onload = receivedData; // add onload event
						
						fr.readAsDataURL(f); // get captured image as data URI
					})
					
					function receivedData() {           
						// readAsDataURL is finished - add URI to IMG tag src
						imgtag.src = fr.result;
					}
				</script>
						