
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?=CS_COMPANY?></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                </div>
                </ol>
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="row">

<div class="col-xl-12">
	<div class="card">
	<div class="card-body">


	<div class="row">
	<div class="col-md-8 pull-left">
		<form>
			<input type="hidden" name="module" value="users">
			<input type="hidden" name="action" value="index">
			<div class="input-group input-search">
				<input type="text" class="form-control" placeholder="Enter search term" name="name" value="<?=$name?>"/>
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
	</div>
	<div class="col-md-4"><!--<a href="<?=url('users','users_add')?>" class="mb-xs mt-xs mr-xs btn btn-success">Add User</a>-->
		<a href="#" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success"  data-toggle="modal" data-target="#standard-modal">Add User</a>
		<?if ($_GET['action']=='inactive') {?>
		  <a href="<?=url('users','index')?>" class="mb-xs mt-xs mr-xs btn btn-success">Back</a>
		  <?}else{?>
		  <a href="<?=url('users','inactive')?>" class="mb-xs mt-xs mr-xs btn btn-success">Restore Users</a>
		<?}?>
	</div>
</div>
</div>
</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
					</div>

					<h2 class="panel-title">Users List</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover mb-none" id="userTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Role</th>

									<th></th>
								</tr>
							</thead>
							<tbody>

								<?php $count=1;
									foreach($check as $id=>$R) { ?>

									<tr id="user<?=$count?>">
										<td><?=$count?></td>
										<td><?=$R['username']?></td>
										<td><?if ($R['roleid']==R_ADMIN) echo'Admin'; else echo 'User';?></td>


										<td class="actions-hover actions-fade">
											<?if (!$inactive){?>
												<?if ($R['delete']=='no') echo''; else {?><a href="<?=url('users','users_delete','id='.$R['id'])?>"  title="Delete" class="delete-row"><i class="fa fa-trash-o"></i></a>

													<a href="<?=url('users','users_edit','id='.$R['id'])?>" title="Edit"><i class="fas fa-user-edit warning"></i></a>
												<a href="<?=url('users','users_rights','id='.$R['id'])?>" title="User Rights"><i class="fas fa-key  warning"></i></a>


												<?}?>
												<?}else {?>
												<a href="<?=url('users','users_undelete','id='.$R['id'])?>" title="Undelete User"><i class="fa fa-check"></i></a>
												<a href="<?=url('users','users_delete_perm','id='.$R['id'])?>" title="Delete User"><i class="fa fa-times warning"></i></a>
											<?}?>
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
	</div>
</div>


<!-- Modal Add User -->
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
							<h4 class="modal-title" id="standard-modalLabel">Add New User</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">

						<div class="col-xl-12">
								<div class="card">

										<div class="card-body">

											<form id="form" class="form-horizontal form-bordered" method="post" action="<?=url('users','users_save')?>" enctype="multipart/form-data">
												<input type="hidden" name="id" value="<?=$users['id']?>">

												<div class="form-group">
													<label class="col-md-12 control-label">User Name</label>
													<div class="col-md-12">
														<input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" data-original-title="Used For Login" id="username" name="users[username]">
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-12 control-label">Full Name</label>
													<div class="col-md-12">
														<input type="text" class="form-control" data-toggle="tooltip" data-trigger="hover" id="fullname" data-original-title="Enter full name" name="users[name]" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-12 control-label">Profile Picture</label>
													<div class="col-md-12">
														<input type="file" class="form-control" data-toggle="tooltip" data-trigger="hover" data-original-title="Profile Picture" name="image">
													</div>
												</div>

												<!-- <div class="form-group">
				                          			<label class="col-md-12 control-label">Location</label>
				              						<div class="col-md-12">
				              							<select name="users[locid]" class="form-control mb-md" required data-toggle="tooltip" data-trigger="hover" data-original-title="Location" >
				              							<option></option>
				              							<? foreach ($locations as $p){?>
				              								<option <?if ($p['id']==$users['locid']) echo 'selected';?> value="<?=$p['id']?>"><?=$p['name']?></option>

				              								<?}?>
				              							</select>
				              						</div>
												</div> -->



												<div class="form-group">
													<label class="col-md-12 control-label">Role</label>
													<div class="col-md-12">
														<select name="users[roleid]" id="role" class="form-control mb-md" required data-toggle="tooltip" data-trigger="hover" data-original-title="Role" >
															<option></option>
															<? foreach ($roles as $p){?>
																<option <?if ($p['id']==$users['roleid']) echo 'selected';?> value="<?=$p['id']?>"><?=$p['name']?></option>

															<?}?>
														</select>
													</div>
												</div>

												<div class="form-group">

													<div class="col-md-12">
													<input class="btn btn-danger form-control" type="submit" value="Save User">

												</div>
												</div>

											</form>

										</div> <!-- end card-body -->
								</div> <!-- end card-->
						</div> <!-- end col -->
					</div>
					<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
							<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
			</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->

</div>

</div>

</div> <!-- container -->
<script>

		/*
	Modal Confirm
	*/
	$(document).on('click', '.modal-save', function (e) {
		e.preventDefault();


	var username=$("#username").val();
	var fullname=$("#fullname").val();
	var role=$("#role").val();
	var count=parseInt($("#count").val());

	if (username=='' || fullname=='' || role=='') {
			new PNotify({
					title: 'Error!',
					text: 'Enter all details',
					type: 'error'
				});
		}
	else{
	$.get('?module=users&action=saveUser&format=json&role='+role+'&username='+username+'&fullname='+fullname+'',null,function(d){
			CC = JSON.parse(d);

			var msg = CC[0].msg;

			if (msg=='exists')
			{
				new PNotify({
					title: 'Error!',
					text: 'Username exists.',
					type: 'error'
				});
			}
			else if (msg='added'){

				new PNotify({
					title: 'Success!',
					text: 'User Added.',
					type: 'success'
				});

			//add user to the table
				var newuserid = CC[0].id;
				var countLess = count-1;

				$("#user"+countLess).after('<tr id="user'+count+'"><td>'+count+'</td><td>'+username+'</td><td></td><td class="actions-hover actions-fade"><a href="?module=users&action=users_delete&id='+newuserid+'"><i class="fa fa-trash-o"></i></a><a href="?module=users&action=users_edit&id='+newuserid+'"><i class="fa fa-pencil"></i></a><a href="?module=users&action=users_rights&id='+newuserid+'"><i class="fa fa-user"></i></a></td></tr>');

				count=count+1;
				$("#count").val(count);

				}

		});
		$.magnificPopup.close();
	}

	});

</script>
