<div class="large-12 medium-12 small-12 columns">
	<h2>User Rights - <?=$user['username']?> </h2>
	<form method="post" action="?module=users&action=user_rights_save">
	<input type="hidden" value="<?=$user['id']?>" name="userid">
	<table class="table  hovered cell-hovered border ">
		<thead>
		<tr>
			<th>Menu</th>
			<th>Submenu(s)</th>
		</tr>
		</thead>
		<? foreach ($menus as $mlabel=>$m) { ?>
		<tr>
			<td>
				<label>
					<input type="checkbox" name="ur[<?=$m['mid']?>][]" <?if($umenus[$m['mid']])echo'checked';?>> <?=$mlabel?>
				</label>
			</td>
			<td>
				<? if ($m['subs'][0]['slabel']) {
					foreach ($m['subs'] as $s) { ?>
				<label> 
					<input type="checkbox" value="<?=$s['sid']?>" <?if($umenus[$m['mid']][$s['sid']])echo'checked';?> name="ur[<?=$m['mid']?>][]" value="<?=$s['sid']?>"> <?=$s['slabel']?>
				</label>
				<?  }
				   }?>
			</td>
		</tr>
		<? } ?>
	</table>
	
	<input type="submit" class="button mb-xs mt-xs mr-xs btn btn-success" value="Save">
	</form>
</div>