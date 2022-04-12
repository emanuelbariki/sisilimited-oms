<header class="page-header">
	<h2>Queues</h2>
</header>

<div class="col-md-12">
	<div class="col-md-8">
		<form>
			<input type="hidden" name="module" value="queue">
			<input type="hidden" name="action" value="queue_index">
			<div class="input-group input-search">
				<input type="text" class="form-control" placeholder="Enter search term" name="name" value="<?=$name?>"/>
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div>
			
		</form>
	</div>
	<div class="col-md-4">
		<a href="?module=queue&action=queue_add" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success">Add</a>
	</div>
</div>


<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
			</div>
			
			<h2 class="panel-title">Queues List</h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover mb-none" id="userTable">
					<thead>
						<tr>
							<th>No.</th><th>Name</th><th>Status</th>
							
							<th></th>
						</tr>
					</thead>
					<tbody>
						
						<?php $count=1;
							foreach($queue as $id=>$R) { ?>	
							<tr id="user<?=$count?>">
								<td><?=$count?></td>
								<td><?=$R['name']?></td>
								<td><?=$R['status']?></td>
								
								
								<td class="actions-hover actions-fade">
									<a href="<?=url('queue','queue_edit','id='.$R['id'])?>" title="Edit"><i class="fa fa-pencil"></i></a>
									<a href="<?=url('queue','queue_delete','id='.$R['id'])?>" onclick="return confirm('Are you sure you want to delete this queue?')" title="Delete"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						<?php $count++;} ?>
						<input type="hidden" id="count" value="<?=$count?>"/>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


