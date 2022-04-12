<!--Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?=CS_COMPANY?></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Moduels</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
                <h4 class="page-title">Settings</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

<div class="row">       
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<section class="panel">
					<form id="form" class="form-horizontal form-bordered" method="post" action="<?=url('home','settings_save')?>" enctype="multipart/form-data">

                        <h3>Company Details</h3>

						<input type="hidden" name="id" value="<?=$users['id']?>">

						<div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Company Name</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[name]" value="<?=CS_COMPANY?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Company Address</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[address]" value="<?=CS_ADDRESS?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Company Address 2</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[street]" value="<?=CS_STREET?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Telephone</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[tel]" value="<?=CS_TEL?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Email</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[email]" value="<?=CS_EMAIL?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Theme Color</label>
                                <input type="color" class="form-control" value="<?=CS_THEME?>" name="cs[themecolor]" />
                            </div>
                        </div>

                        <div class="form-row">
                            
                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Full Color Logo</label>
                                <input type="file" class="form-control" name="clogo" />
                            </div>

                            
                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">White Logo</label>
                                <input type="file" class="form-control" name="c_w_logo" /> <!-- Company White Logo -->
                            </div>

                            <div class="form-group col-md-4">
                                <label for="carname" class="col-form-label">Dark Logo</label>
                                <input type="file" class="form-control" name="c_d_logo" /> <!-- Company Dark Logo -->
                            </div>

                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left">Current Full Color Logo</label>
                                <img width="80%" src="<?=CS_LOGO?>"/> 
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left">Current White Logo</label>
                                <img width="80%" src="<?=CS_WHITE_LOGO?>"/> 
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label" style="text-align:left">Current Dark Logo</label>
                                <img width="80%" src="<?=CS_DARK_LOGO?>"/> 
                            </div>

                        </div>

                        <hr>

                        <h3>Email Settings</h3>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">Email Password</label>
                                <input type="password" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[emailpass]" value="<?=CS_EMAILPASS?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">Host Name</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[emailhost]" value="<?=CS_EMAILHOST?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">Port No.</label>
                                <input type="text" class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[emailport]" value="<?=CS_EMAILPORT?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">Email Status</label>
                                <select required class="form-control" name="cs[emailstat]">
									<option value="on" <?=selected(CS_EMAILSTAT,'on')?>>On</option>
									<option value="off" <?=selected(CS_EMAILSTAT,'off')?>>Off</option>
								</select>
                            </div>
                        </div>

						<hr>

						<h3>SMS Settings</h3>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">SMS Username</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[smsuser]" value="<?=CS_SMSUSER?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">SMS Password</label>
                                <input type="password" required class="form-control" data-toggle="tooltip" data-trigger="hover" name="cs[smspass]" value="<?=CS_SMSPASS?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">SMS Sender</label>
                                <input type="text" required class="form-control" data-toggle="tooltip" readonly="" data-trigger="hover" name="cs[emailport]" value="<?=CS_SMSNAME?>">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="carname" class="col-form-label">SMS Status</label>
                                <select required class="form-control" name="cs[smsstat]">
									<option value="on" <?=selected(CS_SMSSTAT,'on')?>>On</option>
									<option value="off" <?=selected(CS_SMSSTAT,'off')?>>Off</option>
								</select>
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
					</form>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- end row-->

</div> <!-- container