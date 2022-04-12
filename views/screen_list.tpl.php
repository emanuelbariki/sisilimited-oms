
<header class="page-header">
	<h2>Screens</h2>
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
			
			<h2 class="panel-title">List of Screens</h2>
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
							<?foreach ($screenData as $s){?>
								<tr>
									<td></td>
									<td><?=$s['name']?></td>
									<td><?=$s['status']?></td>
									<td>
									<a href="?module=screen&action=delete&id=<?=$s['id']?>"><i class="fa fa-ban"></i></a>
									<a href="?module=screen&action=edit&id=<?=$s['id']?>"><i class="fa fa-pencil"></i></a>
									
										
										</td>
								</tr>
							<?}?>
					
					
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


