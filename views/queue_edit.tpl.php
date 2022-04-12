<header class="page-header">
	<h2><?if ($edit) echo 'Edit'; else echo 'Add';?> Queue</h2>
</header>

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
				</div>
				
				<h2 class="panel-title">Queue Details</h2>
			</header>
			<div class="panel-body">

<form id="form" class="form-horizontal form-bordered" method="post" action="<?=url('queue','queue_save')?>">
<table class="crm_table" width="100%">
<col width="80">
<tr>
	<th width="100px">Name</th>
	<td width="200px">
		<input type="hidden" name="id" value="<?=$queue['id']?>">
		<input type="text" class="required box form-control" id="name" title="Name is required" style="width:100%" name="queue[name]" value="<?=$queue['name']?>">
	</td>
</tr>

<tr>
	<th width="100px">Status</th>
	<td width="200px">
		<select name="queue[status]" class="form-control box">
			<option value="active" <?=selected($queue['status'],'active')?>>Active</option>
			<option value="inactive" <?=selected($queue['status'],'inactive')?>>In-Active</option>
		</select>
	</td>
</tr>

</table>


<div class="form-group">	
						<div class="col-md-12">
							<div class="col-md-6">
								<a href="?module=queue&action=queue_index" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block">Back</a>
							</div>
							<div class="col-md-6">
								<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
		
		
		
		
	</div>
</div>

<script>
	
	$(function(){
		
		$("#name").focus();
		
	})
	
</script>