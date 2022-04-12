<header class="page-header">
	<h2><?if ($edit) echo 'Edit'; else echo 'Add';?> User</h2>
</header>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
					<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
				</div>

				<h2 class="panel-title">User Details</h2>
			</header>
			<div class="panel-body">
				<form id="form" class="form-horizontal form-bordered" method="post" action="<?=url('users','users_save')?>">
					<input type="hidden" name="id" value="<?=$users['id']?>">

					<div class="form-group">
						<label class="col-md-3 control-label">User Name</label>
						<div class="col-md-6">
							<input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="users[username]" value="<?=$users['username']?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Full Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" data-toggle="tooltip" data-trigger="hover" data-original-title="Enter full name" name="users[name]" value="<?=$users['name']?>" required>
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-md-3 control-label">Location</label>
						<div class="col-md-6">
							<select name="users[locid]" class="form-control mb-md" required >
							<option></option>
							<? foreach ($locations as $p){?>
								<option <?if ($p['id']==$users['locid']) echo 'selected';?> value="<?=$p['id']?>"><?=$p['name']?></option>

								<?}?>
							</select>
						</div>
					</div> -->

					<div class="form-group">
						<label class="col-md-3 control-label">Role</label>
						<div class="col-md-6">
							<select name="users[roleid]" class="form-control mb-md" required >
							<option></option>
							<? foreach ($roles as $p){?>
								<option <?if ($p['id']==$users['roleid']) echo 'selected';?> value="<?=$p['id']?>"><?=$p['name']?></option>

								<?}?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Status</label>
						<div class="col-md-6">
							<select class="form-control" required name="users[status]">
								<option value="active" <?=selected($users['status'],"active")?>>Active</option>
								<option value="inactive" <?=selected($users['status'],"inactive")?>>In-Active</option>
							</select>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<div class="col-md-6">
								<a href="?module=users&action=index" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block">Back</a>
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
