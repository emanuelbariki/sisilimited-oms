
<!-- Plugins css -->
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<!-- Start Content-->
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?=CS_COMPANY?></a></li>
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li> -->
                        <li class="breadcrumb-item active">Task Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Ticket Name - <?=$ticketData['name']?></h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <!-- <div class="col-xl-8 col-lg-7">
        
        </div>  -->

        <div class="col-xl-12 col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class='mdi mdi-dots-horizontal font-18'></i>
                        </a>
                    </div> <!-- end dropdown-->

                    <h5 class="card-title font-16 mb-3">Ticket</h5>

                    <form action="<?=url('tickets','add')?>" method="post" enctype="multipart/form-data"">
                        
                        <!-- <div action="/" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                            <div class="fallback">
                                <input name="file" type="file" />
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h3 text-muted dripicons-cloud-upload"></i>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                            
                        </div> -->

                        <?
                            if ($ticketData['fileupload'] == 1) {?>
                                <div class="form-group mb-0">
                                    <label>Click To Upload file</label>
                                    <div class="input-group dropzone">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input dropzone" id="inputGroupFile04">
                                            <label class="custom-file-label" for="inputGroupFile04"></label>

                                            <div class="dz-message needsclick">
                                                <i class="h3 text-muted dripicons-cloud-upload"></i>
                                                <!-- <h4>Drop files here or click to upload.</h4> -->
                                            </div>
                                        </div>
                                        
                                    
                                    </div>
                                </div>  
                            <?}
                        ?>
                        

                        <hr>

                        <?
                            if ($ticketData['payments'] == 1) {?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Payment For</label>
                                        <select id="inputState" class="form-control input-lg" name="order_costs[id]">
                                            <option selected disabled>Choose</option>
                                            <?
                                                foreach ($ordercosts as $id => $R) {?>
                                                    <option <?if ($R['paid']==1) {echo "disabled";}?> value="<?=$R['id']?>"><?=$R['costName']?> - <?=$R['costGroup']?>  <?if ($R['paid']==1) {echo "  - ( PAID )";}?>  </option>
                                                    
                                                    <!-- <option <?if ($R['paid']==1) {echo "disabled";}?> value="<?=$R['id']?>"><?=$R['costName']?> - <?=$R['costGroup']?>  - (&nbsp;<?=$R['amount']?> TZS/=&nbsp;) <?if ($R['paid']==1) {echo " || PAID";}?>  </option> -->
                                                <?}
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputState" class="col-form-label">Amount Paid</label>
                                        <input type="number" class="form-control input-lg" name="order_costs[paid_amount]">
                                    </div>
                                </div>
                            <?}
                        ?>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                                
                                <div class="form-row">
                                    <div class="custom-control custom-checkbox float-left">
                                        <input type="checkbox" class="custom-control-input" id="sendnotification" name="ticket[done]" value="1">
                                        <label class="custom-control-label" for="sendnotification">
                                            Mark as Done
                                        </label>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4" class="col-form-label"> </label>
                                        <textarea rows="3" class="form-control border-0 resize-none col-md-12" name="ticket[remarks]" placeholder="Remarks..."></textarea>
                                        <input name="id" type="hidden" value="<?=$ticket[0]['id']?>">
                                        <input name="orderid" type="hidden" value="<?=$_GET['orderid']?>">
                                        <input name="order_costs[orderid]" type="hidden" value="<?=$_GET['orderid']?>">
                                    </div>
                                </div>


                            </div>
                        </div>

                        
                        <div class="form-row pt-2 pl-2">
                            <div class="form-group col-md-12">
                                <button class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>

                    </form>


                    <!-- Preview -->
                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);" class="text-muted font-weight-medium" data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                            <i class="dripicons-cross"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end file preview template -->


                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                            ZIP
                                        </span>
                                    </div>
                                </div>
                                <div class="col pl-0">
                                    <a href="javascript:void(0);" class="text-muted font-weight-medium">Ubold-sketch-design.zip</a>
                                    <p class="mb-0 font-12">2.3 MB</p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                            JPG
                                        </span>
                                    </div>
                                </div>
                                <div class="col pl-0">
                                    <a href="javascript:void(0);" class="text-muted font-weight-medium">Dashboard-design.jpg</a>
                                    <p class="mb-0 font-12">3.25 MB</p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-0 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-secondary rounded">
                                            .MP4
                                        </span>
                                    </div>
                                </div>
                                <div class="col pl-0">
                                    <a href="javascript:void(0);" class="text-muted font-weight-medium">Admin-bug-report.mp4</a>
                                    <p class="mb-0 font-12">7.05 MB</p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12">
        <div class="card">
                <div class="card-body">                   
                    <h4 class="mb-4 mt-0 font-16">Comments</h4>
                    <!-- <div class="border rounded mt-4">
                        <form action="#" class="comment-area-box">
                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your comment..."></textarea>
                            <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                <div>
                                    
                                </div>
                                <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message mr-1'></i>Submit</button>
                            </div>
                        </form>
                    </div> -->
                    <br>
                    <div class="clerfix"></div>
                    
                    <div class="media">
                        <img class="mr-2 rounded-circle" src="assets/images/users/user-3.jpg"
                            alt="Generic placeholder image" height="32">
                        <div class="media-body">
                            <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted float-right">5 hours ago</small></h5>
                            Nice work, makes me think of The Money Pit.
                        </div>
                    </div>

                    <div class="media mt-3">
                        <img class="mr-2 rounded-circle" src="assets/images/users/user-5.jpg"
                            alt="Generic placeholder image" height="32">
                        <div class="media-body">
                            <h5 class="mt-0">Kevin Martinez <small class="text-muted float-right">1 day ago</small></h5>
                            It would be very nice to have.
                        </div>
                    </div>

                    <!-- <div class="text-center mt-2">
                        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1"></i> Load more </a>
                    </div> -->


                </div> <!-- end card-body-->
            </div>
        
        
        </div>
    </div>
    <!-- end row -->
    
</div> <!-- container -->



<!-- Plugins js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>