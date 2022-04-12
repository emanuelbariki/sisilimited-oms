
<header class="page-header">
	<h2>Crops/Animals</h2>
</header>

<div class="col-md-12">
	
	<div class="col-md-4">
		<a href="?module=crop&action=crop_add" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success">Add</a>
	</div>
</div>


<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
				<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
			</div>
			
			<h2 class="panel-title">List of Crops</h2>
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
							<?foreach ($listData as $p){?>
								<tr>
									<td><?=$p['id']?></td>
									<td><?=$p['name']?></td>
									<td><?=$p['status']?></td>
									
									<td>
									<a href="?module=crop&action=crop_delete&id=<?=$p['id']?>"><i class="fa fa-ban"></i></a>
									<a href="?module=crop&action=crop_edit&id=<?=$p['id']?>"><i class="fa fa-pencil"></i></a>
									
										
									</td>
								</tr>
							<?}?>
					
					
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


